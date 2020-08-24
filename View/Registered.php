<!DOCTYPE html>
<?php $thisPage="Registered";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/Registered.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
require "Header.php";
?>
<img src="../Img/Sponsors/Volunteers.png" alt="Volunteer Hands" id="volunteer_img">

<h1 id="thankYouHeader">Thank you for your application!</h1>
<p>We are delighted to welcome you into our team of volunteers.</p>
<a type="submit" href="../View/CMSlogin.php" id="goBack">Return to login screen</a>
<?php
require "Footer.php";
?>
</body>
</html>
