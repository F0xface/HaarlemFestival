<?php
include_once '../Controller/FoodLogic.php';
$controller = FoodLogic::InitController();

$restaurant = $_POST['restaurant'];
$result = $controller->GetRestaurantPrice($restaurant);
echo json_encode($result);