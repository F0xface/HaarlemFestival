dayButtons = window.document.getElementsByClassName("day_buttons");
elements = window.document.getElementsByClassName("tables");
infoElements = window.document.getElementsByClassName("info_cards");
var ticketArray = [];

function showDay(button){
    hide();
    var table = button +"Table";
    var info = button +"Info";
    document.getElementById(table).style.display="table";
    document.getElementById(info).style.display="inline-block";
    document.getElementById(button).style.color="#ad0c80";
}

function showArtists(){
    hide();
    document.getElementById("Artists").style.display="block";
    document.getElementById("artists_button").style.color="#ad0c80";
}

function showTicketOrder(){
    hide();
    document.getElementById("OrderCard").style.display="block";
}

function hide(){
    for(const btn of dayButtons) {btn.style.color = "grey"}
    for(const el of elements) {el.style.display = "none"}
    for(const el of infoElements) {el.style.display = "none"}
}

function showOptions(){
    if(document.getElementById("all_access").checked) {
        document.getElementById("artistsDropDown").style.visibility = "hidden";
        $("#dateDropDown").append("<option id = 'all_days' value = 'all_days'> All days</option>")
    }
    else {
        document.getElementById("artistsDropDown").style.visibility = "visible";
        var exists = document.getElementById("all_days");
        if(!!exists){
            var x = document.getElementById("dateDropDown");
            x.removeChild(x.options['all_days']);
        }
    }
    document.getElementById("dateDropDown").style.visibility = "visible";
}

$(document).ready(function(){
    $("#dateDropDown").change(function(){
        if(document.getElementById("custom_access").checked){
            var e = document.getElementById("dateDropDown");
            var date = e.options[e.selectedIndex].value;
            $.ajax({
                type: "POST",
                url: "ArtistsOnDay.api.php",
                data: {date: date},
                success: data => {
                    const schedules = JSON.parse(data);
                    var len = schedules.length;

                    $("#artistsDropDown").empty();
                    for (var i = 0; i < len; i++) {
                        var name = schedules[i]['artist'];
                        $("#artistsDropDown").append("<option value='" + name + "'>" + name + "</option>");
                    }
                }
            });
        }
    });
});

function GetTicketInfo() {
    var e = document.getElementById("dateDropDown");
    var date = e.options[e.selectedIndex].value;

    if(document.getElementById("custom_access").checked) {
        var e = document.getElementById("artistsDropDown");
        var artist = e.options[e.selectedIndex].value;
        if(artist != '0') {
            $.ajax({
                type: "POST",
                url: "DanceTicket.api.php",
                data: {date: date, artist},
                success: data => {
                    const output = JSON.parse(data);
                    if($("#"+date+"_"+output[0]['venue'].split(' ').join('_')).length === 0) {
                        $("#ticketBox").append("<tr id='" + date + "_" + output[0]['venue'].split(' ').join('_')
                            + "'><td>" + artist + " on " + date + " at " + output[0]['venue'] + " from "
                            + output[0]['time_start'].slice(0, -3) + " until " + output[0]['time_finish'].slice(0, -3)
                            + "</td><td><select id = '"+date+"_"+artist.split(' ').join('_').length
                            +"_amount' onchange='updateAmount(this.id)'></select></td><td>€ " + output[0]['price'] + ",-</td></tr>"
                        );
                        amountBox("#"+date+"_"+artist.split(' ').join('_').length+"_amount");
                        var ticket = {
                            date: date,
                            amountId: date+"_"+artist.split(' ').join('_').length+"_amount",
                            amount: 1,
                            artist: artist,
                            price: output[0]['price'],
                            time_start: output[0]['time_start']
                        };
                        ticketArray.push(ticket);
                        updateTotalPrice();
                    }
                }
            });
        }
    }
    else{
        if(date != '0'){
            if(date === 'all_days'){
                var artists = 'all_artists';
            }
            else{
                var artists = 'all';
            }
            $.ajax({
                type: "POST",
                url: "DanceAllDayTicket.api.php",
                data: {date: date, artists},
                success: data => {
                    const output = JSON.parse(data);
                    if ($("#" + date + "_all_access").length === 0) {
                        $("#ticketBox").append("<tr id='" + date + "_all_access'><td>All-access pass for "
                            + date + "</td><td><select id = '"
                            + date + "_all_amount' class='amountDropDown' onchange='updateAmount(this.id)'></select></td>"
                            + amountBox(this.id) + "<td>€ "+output[0]['price']+",- pp.</td></tr>"
                        );
                        amountBox("#" + date + "_all_amount");
                        var ticket = {
                            date: output[0]['date'],
                            amountId: date + "_all_amount",
                            amount: 1,
                            artist: output[0]['artist'],
                            price: output[0]['price'],
                            time_start: output[0]['time_start']
                        };
                        ticketArray.push(ticket);
                        updateTotalPrice();
                    }
                }
            });
        }
    }
}

function updateAmount(id){
    var e = document.getElementById(id);
    var amount = e.options[e.selectedIndex].value;
    if(amount <= 10) {
        for (i = 0; i < ticketArray.length; i++) {
            if (ticketArray[i].amountId === id) {
                ticketArray[i].amount = amount;
            }
        }
    }
    updateTotalPrice();
}

function amountBox(id){
    for(i =1; i <= 10; i++) {
        $(id).append("<option value = "+i+">"+i+"</option>");
    }
}

function confirmButton(){
    if(document.getElementById("ticketBox").rows.length > 1){
        for(i = 0; i < ticketArray.length; i++) {
            var date = ticketArray[i].date;
            var time = ticketArray[i].time_start.slice(0, -3);
            var amount = ticketArray[i].amount;
            var price = ticketArray[i].price * ticketArray[i].amount;
            var artist = ticketArray[i].artist;
            $.ajax({
                type: "POST",
                url: "DanceTickets.api.php",
                data: {date, time, amount, price, artist},
            });
        }
        window.location.href = '../View/Shoppingcart.php';
    }
}

function updateTotalPrice(){
    var totalPrice = 0;
    for(i = 0; i < ticketArray.length; i++){
        totalPrice = totalPrice + (ticketArray[i].amount * ticketArray[i].price)
    }
    document.getElementById("totalPrice").innerHTML = "Total: €   " + totalPrice +",-";
}



