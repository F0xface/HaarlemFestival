<?php
include_once '../Model/Foodsql.php';

if (isset($_POST['cart_add'])) {
    session_start();
    $_SESSION['cart'][] = array(
        'event' => "Food",
        'restaurant' => $_POST['restaurant'],
        'amount' => ($_POST['adultAmount']+ $_POST['childAmount']),
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'price' => (($_POST['adultAmount']+ $_POST['childAmount'])* 10),
        'comment' => $_POST['comment'],
        header('Location: ../View/Food.php'));
};

class FoodLogic{

    private $d;
    public static $instance;

    private function __construct(){
        $this->d = FoodSQL::GetFoodSQL();
    }

    public static function InitController(){
        if(!self::$instance){
            self::$instance = new FoodLogic();
        }
        return self::$instance;
    }

    public function GetRestaurants()
    {
        $result = $this->d->GetRestaurantsSql();
        return $result;
    }

    public function GetCuisines()
    {
        $result = $this->d->GetCuisinesSql();
        return $result;
    }

    public function GetRestaurantCuisines($input)
    {
        $result = $this->d->GetRestaurantCuisinesSql($input);
        $restaurants = $result->fetch_all(MYSQLI_ASSOC);
        return $restaurants;
    }

    public function GetReservationDate($input)
    {
        $result = $this->d->GetReservationDateSql($input);
        $restaurants = $result->fetch_all(MYSQLI_ASSOC);
        return $restaurants;
    }

    public function GetReservationTime($restaurant, $date)
    {
        $result = $this->d->GetReservationTimeSql($restaurant, $date);
        $restaurants = $result->fetch_all(MYSQLI_ASSOC);
        return $restaurants;
    }

    public function GetRestaurantPrice($restaurant)
    {
        $result = $this->d->GetRestaurantPriceSql($restaurant);
        $restaurants = $result->fetch_all(MYSQLI_ASSOC);
        return $restaurants;
    }
}

