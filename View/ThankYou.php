<!DOCTYPE html>
<?php $thisPage="Thankyou";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank you!</title>
    <link rel="stylesheet" href="../CSS/Thankyou.css">
</head>
<body>
<?php
require "Header.php";
?>

<img src="../Img/History/stbavo.png" alt="The church of st. bavo" id="intro_img">

<h1 id="thankYouHeader">Thank you for your reservation!</h1>
<p>you will recieve a email shortly with your ticket.</p>

<form action="http://hfteam4.infhaarlem.nl">
    <button type="submit" id="goBack">Go back home</button>
</form>
<?php
require "Footer.php";
?>
</body>
</html>
