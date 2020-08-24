<!DOCTYPE html>
<?php $thisPage = "Food";
include_once '../Controller/FoodLogic.php';
$controller = FoodLogic::InitController();
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../CSS/Food.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php
require "Header.php";
?>

<h1 id = banner>Visit one of our famous restaurants for the ultimate Haarlem experience</h1>
<div id = "sorting_banner">
    <?php
    $result = $controller->GetCuisines();
    while ($row = $result->fetch_assoc()) {
        echo "<button id = '". $row['cuisine'] ."' class = 'sorting_buttons' OnClick = 'showRestaurants(this.id)'>" . $row['cuisine'] . "</button>";
    }
    ?>
</div>
<div id = restaurants>
    <?php
    $result = $controller->GetRestaurants();
    show_restaurants($result);
    ?>
</div>

<?php
function show_restaurants($result){
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        echo "<div id = '". str_replace(' ', '_', $row['name']) ."_id' class = restaurant_entity>";
        if($i % 2 ==! 0){
            echo "<div class = 'restaurant_second_half restaurant_half'>";
            echo"<img src = '".$row['photo']."'>";
            echo "</div>";
        }
        echo "<div class = 'restaurant_first_half restaurant_half'>";
        echo "<h2 class = 'restaurant_name'>". $row['name'] ."</h2>";
        echo "<h3 class = 'restaurant_cuisine'>". $row['cuisine'] ."</h3>";
        echo "<img class = 'stars' src = '". $row['stars'] ."'>";
        if($i % 2 === 0) {

            echo "<div class = 'buttons' style = 'right: 20px;'>";
        }
        else{
            echo "<div class = 'buttons' style = 'left: 20px;'>";
        }
        echo "<button class = 'info_res_button'><a class = 'info_link' target = '_blank' href = '" . $row['info'] . "'>More info</a></button>";
        echo "<button id = '".str_replace(' ', '_', $row['name'])."' class = 'info_res_button' onclick='makeReservation(this.id)'>Make your reservation</button>";
        echo "</div>";
        echo "</div>";
        if($i % 2 === 0){
            echo "<div class = 'restaurant_second_half restaurant_half'>";
            echo"<img src = '".$row['photo']."'>";
            echo "</div>";
        }
        echo"</div>";
        $i++;
    }
}
?>

<div id="myModal" class="modal" z-index=1>
    <div id = "pop-up" class="modal-content">
        <span class="close">&times;</span>
        <form  class = 'text-center' action="../Controller/FoodLogic.php" method="post">
        <div id="reservationScreen">
            <h1 id="popupHeader">Book a table</h1>
            <p id="popupSubHeader">For Restaurant </p>
                <select id = "restaurantDropDown" class="DropDown" name="restaurant">
                </select>
                <select id = "dateDropDown" class="DropDown" name="date">
                </select>
                <select id = "timeDropDown" class="DropDown" name="time">
                </select>
                <select id = "adultDropDown" class="DropDown" name="adultAmount">
                    <?php
                    for ($i = 0; $i <= 10; $i++){
                        echo "<option value='" . $i ."'>" .$i. "</option>";
                    }
                    ?>
                </select>
                <select id = "childDropDown" class="DropDown" name="childAmount">
                    <?php
                    for ($i = 0; $i <= 10; $i++){
                        echo "<option value='" . $i ."'>" .$i. "</option>";
                    }
                    ?>
                </select>
            <textarea id = 'text' class = "DropDown" type ='text' name="comment" placeholder = "Feel free to leave a comment"></textarea>
                <button id="submit" onclick="confirm()" type="button">Add to cart</button>

        </div>
        <div id="confirmationScreen">
            <h1 id="confirmationHeader">Your reservation has been <br> added to your cart and will be <br> finalized after payment* </h1>
            <p id="totalFoodPrice">Total price:  </p>
            <p id="confirmationText">*A deposit of 10 euros per person is required to complete <br> your reservation, you will get the full amount <br> of the deposit deducted from your bill</p>
            <button onclick="RefreshPage()" id="stay" class="confirmationButtons" type="button">Stay on this page</button>
            <button onclick="GotoCart()" id="goToCart" class="confirmationButtons" name="cart_add" type="submit">Go to cart</button>
        </div>
        </form>
    </div>
</div>

<?php
require "Footer.php";
?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../Controller/FoodScript.js"></script>
</html>
