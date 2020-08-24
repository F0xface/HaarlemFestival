sort_buttons = window.document.getElementsByClassName("sorting_buttons")
restaurants = window.document.getElementsByClassName("restaurant_entity")
var currentRestaurant = "";

function hide(){
    for(const res of restaurants) {res.style.display = "none"}
    for(const btn of sort_buttons) {btn.style.color = "black"}
}

function showRestaurants(cuisine) {
    hide();
    for(i = 0; i < restaurants.length; i++) {
        restaurants[i].style.display = 'none';
    }
    $.ajax({
        type: "POST",
        url: "RestaurantsPerCuisine.api.php",
        data: {cuisine: cuisine},
        success: data => {
            const results = JSON.parse(data);
            for(i = 0; i < results.length; i++){
                document.getElementById(results[i]['name'].split(' ').join('_')+"_id").style.display = 'block';
            }
        }
    });
    document.getElementById(cuisine).style.color='red';
}

function makeReservation(restaurant){
    currentRestaurant = restaurant;
    $("#restaurantDropDown").append("<option value='"+restaurant.split('_').join(' ')+"' selected>"+restaurant.split('_').join(' ')+"</option>")
    $("#dateDropDown").append("<option value='0' selected disabled hidden>Choose date</option>");
    $("#timeDropDown").append("<option value='0' selected disabled hidden>Choose time</option>");
    $("#adultDropDown").append("<option value='0' selected disabled hidden>Number of adults</option>");
    $("#childDropDown").append("<option value='0' selected disabled hidden>Number of children (0-12 yrs)</option>");

    document.getElementById("popupSubHeader").innerHTML = "For " + restaurant.split('_').join(' ');
    var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    modal.style.display = "block";

// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        window.location.href = '../View/Food.php';
    }

// // When the user clicks anywhere outside of the modal, close it
//     window.onclick = function(event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }


    $.ajax({
        type: "POST",
        url: "GetReservationDate.api.php",
        data: {restaurant: restaurant.split('_').join(' ')},
        success: data => {
            const results = JSON.parse(data);
            $("#dateDropDown").empty();
            $("#dateDropDown").append("<option value='0' selected disabled hidden>Choose date</option>");
            for(i = 0; i < results.length; i++){
                var date = results[i]['date'];
                $("#dateDropDown").append("<option value='" + date + "'>" + date + "</option>");
            }
        }
    });
}

$("#dateDropDown").change(function() {
    var e = document.getElementById("dateDropDown");
    var date = e.options[e.selectedIndex].value;
    var restaurant = currentRestaurant.split('_').join(' ');
    $.ajax({
        type: "POST",
        url: "GetReservationTime.api.php",
        data: {restaurant: restaurant, date: date},
        success: data => {
            const results = JSON.parse(data);
            $("#timeDropDown").empty();
            for (i = 0; i < results.length; i++) {
                var time = results[i]['time_start'].slice(0, -3);
                $("#timeDropDown").append("<option value='" + time + "'>" + time + "</option>");
            }
        }
    });
});

function confirm(){
    var e = document.getElementById("dateDropDown");
    var date = e.options[e.selectedIndex].value;
    var e = document.getElementById("adultDropDown");
    var adult = e.options[e.selectedIndex].value;
    var e = document.getElementById("childDropDown");
    var child = e.options[e.selectedIndex].value;
    if((child !== '0' || adult !== '0') && date !== '0'){
        document.getElementById("reservationScreen").style.display = "none";
        document.getElementById("confirmationScreen").style.display = "block";
        var restaurant = currentRestaurant.split('_').join(' ');
        $.ajax({
            type: "POST",
            url: "GetTotalPrice.api.php",
            data: {restaurant: restaurant.split('_').join(' ')},
            success: data => {
                const results = JSON.parse(data);
                const childPrice = results[0]['child_price'];
                const adultPrice = results[0]['adult_price'];
                var e = document.getElementById("childDropDown");
                var children = e.options[e.selectedIndex].value;
                var f = document.getElementById("adultDropDown");
                var adults = f.options[f.selectedIndex].value;
                var totalPrice = (childPrice * children) + (adultPrice * adults);
                document.getElementById("totalFoodPrice").innerHTML = "Total price: €" + totalPrice;
            }
        });
    }
}

function GotoCart(){
    window.location.href = '../View/Shoppingcart.php';
}

function RefreshPage(){
    window.location.href = '../View/Food.php';
}