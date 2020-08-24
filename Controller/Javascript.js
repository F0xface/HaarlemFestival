function hideall() {
    document.getElementById("Thursday").style.display="none";
    document.getElementById("Friday").style.display="none";
    document.getElementById("Saturday").style.display="none";
    document.getElementById("Sunday").style.display="none";

    document.getElementById("btn_Thursday").style.backgroundColor= "white";
    document.getElementById("btn_Friday").style.backgroundColor= "white";
    document.getElementById("btn_Saturday").style.backgroundColor= "white";
    document.getElementById("btn_Sunday").style.backgroundColor= "white";

    document.getElementById("btn_Thursday").style.color="black";
    document.getElementById("btn_Friday").style.color="black";
    document.getElementById("btn_Saturday").style.color="black";
    document.getElementById("btn_Sunday").style.color="black";
}

function showThursday(){
    hideall();
    document.getElementById("Thursday").style.display="block";
    document.getElementById("btn_Thursday").style.backgroundColor= "black";
    document.getElementById("btn_Thursday").style.color="white";
}

function showFriday(){
    hideall();
    document.getElementById("Friday").style.display="block";
    document.getElementById("btn_Friday").style.backgroundColor="black";
    document.getElementById("btn_Friday").style.color="white"
}

function showSaturday(){
    hideall();
    document.getElementById("Saturday").style.display="block";
    document.getElementById("btn_Saturday").style.backgroundColor="black";
    document.getElementById("btn_Saturday").style.color="white"
}

function showSunday(){
    hideall();
    document.getElementById("Sunday").style.display="block";
    document.getElementById("btn_Sunday").style.backgroundColor="black";
    document.getElementById("btn_Sunday").style.color="white"
}

function  showTable(Day) {
    document.getElementById("Thursday").style.display="none";
    document.getElementById("Friday").style.display="none";
    document.getElementById("Saturday").style.display="none";
    document.getElementById("Sunday").style.display="none";

    document.getElementById("btn_Thursday").style.backgroundColor="white";
    document.getElementById("btn_Friday").style.backgroundColor="white";
    document.getElementById("btn_Saturday").style.backgroundColor="white";
    document.getElementById("btn_Sunday").style.backgroundColor="black";

    document.getElementById(Day).style.display="block";
}

function showPopUp() {
    document.getElementById("confirmCart").style.display="block";
}

function showOrdertickets() {
    document.getElementById("id_order_tickets").style.visibility="visible";
}

function hideOrdertickets() {
    document.getElementById("id_order_tickets").style.visibility="hidden";
}

function SingelticketPrice(amountObject) {
    var amount = amountObject.value;
    var price = amount * 17.50;
    document.getElementById("singleprice").innerHTML = price;
}

function FamilyticketPrice(amountObject) {
    var amount = amountObject.value;
    var price = amount * 60.00;
    document.getElementById("familyprice").innerHTML = price;
}

function TotalticketPrice() {
    var singleprice = document.getElementById("singleprice").textContent;
    var familyprice = document.getElementById("familyprice").textContent;
    var totalprice = +singleprice + +familyprice;
    document.getElementById("totalprice").innerText = totalprice;
}

function ScrollToBottom(){
    window.scrollTo(0,document.body.scrollHeight);
}

function showOrderRestaurant(name){
    document.getElementById("restaurant_name").innerHTML = name;
}
