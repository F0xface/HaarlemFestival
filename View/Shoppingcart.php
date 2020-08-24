<!DOCTYPE HTML>
<?php $thisPage="ShoppingCart";?>
<html lang="en">
<head>
    <title>Shopping cart</title>
    <link rel="stylesheet" href="../CSS/Shoppingcart.css">
    <script type="text/javascript" src="../Controller/Javascript.js"></script>
</head>
<body>
<?php
require_once "../Controller/ShoppingCartLogic.php";
require "Header.php";
?>

<div class="shoppingintro">
    <p>Shopping cart</p>
</div>

<?php

?>

<?php
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart) {
        echo "<div class='ticket'>";
        echo "<img src='../img/Shopping_Cart/ticket.png' alt='your ticket' id='ticket_img'>";
        echo "<p id='event_name'>".$cart['event']."</p>";
        echo "<p id='start_time'>Date: ".$cart['date']," ", $cart['time']."</p>";
        echo "<p id='amount'>Amount: ".$cart['amount']."</p>";
        echo "<p id='Price'>Price: €".$cart['price']."</p>";
        echo "</div>";
    }
} else {
    echo "<h1 class='empty_message'>Shoppingcart is empty </h1>";
    echo "<p class='empty_message'>Go to one of the event pages to add tickets to your cart</p>";
}
?>

<div id="email_box">
    <form action="../Controller/ShoppingCartLogic.php" method="post">
        <?php
            if (isset($_GET['error'])){
                if ($_GET['error'] == "emptyfields"){
                    echo "<p class='error'>Fields can't be empty<p>";
                }
                elseif ($_GET['error'] == "notthesame"){
                    echo "<p class='error'>Email must be the same</p>>";
                }
                elseif ($_GET['error'] == "notvalid") {
                    echo "<p class='error'>This email is not valid</p>";
                }
                elseif ($_GET['error'] == "cartisempty"){
                    echo "<p class='error'>Your cart is empty</p>";
                }
                ?>
                <script type="text/javascript">
                    ScrollToBottom();
                </script>
        <?php
            }
        ?>
        <div id="email_div">
            <label for="email" class="email_lbl">Enter your email: </label>
            <input id="email" type="text" class="email" name="email" placeholder="example@example.com">
        </div>
        <div id="emailrpt_div">
            <label for="emailrpt" class="email_lbl">Re-enter your email: </label>
            <input id="emailrpt" type="text" class="email" name="emailrpt">
        </div>
        <?php
            GetTotal();
            echo "<h2 id=\"Total_Price\">Total Price: €".$_SESSION['TotalPrice']."</h2>";
        ?>
        <button type="submit" id="order_tickets" name="order_tickets">Check out!</button>
    </form>

    <img class="banks" id="ideal" src="../img/Shopping_Cart/IDEAL.gif" alt="IDeal">
    <img class="banks" id="paypal" src="../img/Shopping_Cart/PayPal.png" alt="Paypal">
    <img class="banks" id="visa" src="../img/Shopping_Cart/VISA.png" alt="Visa">
    <img class="banks" id="american_express" src="../img/Shopping_Cart/AmericanExpress.png" alt="American express">
    <img class="banks" id="mastercard" src="../img/Shopping_Cart/Mastercard.png" alt="Mastercard">
</div>

<?php
    require "Footer.php";
?>
</body>
</html>

