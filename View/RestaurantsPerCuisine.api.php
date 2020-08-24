<?php
include_once '../Controller/FoodLogic.php';
$controller = FoodLogic::InitController();

$cuisine = $_POST['cuisine'];
$result = $controller->GetRestaurantCuisines($cuisine);
echo json_encode($result);
