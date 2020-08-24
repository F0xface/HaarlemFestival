<?php
include_once '../Controller/FoodLogic.php';
$controller = FoodLogic::InitController();

$restaurant = $_POST['restaurant'];
$date = $_POST['date'];
$result = $controller->GetReservationTime($restaurant, $date);
echo json_encode($result);
