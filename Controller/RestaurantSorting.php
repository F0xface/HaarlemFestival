<?php
include_once '../Controller/FoodLogic.php';

$input = intval($_GET['cuisine']);
GetRestaurantCuisines($input);

