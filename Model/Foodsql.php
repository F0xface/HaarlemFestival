<?php
include 'Conn.php';
class FoodSQL
{
    private $conn;
    private $db;
    public static $instance;

    public function __construct() {
        $this->db = dbconnect::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public static function GetFoodSQL(){
        if(!self::$instance){
            self::$instance = new FoodSQL();
        }
        return self::$instance;
    }

    public function GetRestaurantsSql()
    {
        $sql = "SELECT `name`, `photo`, `info`, `cuisine`, `stars` FROM `restaurants`";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetCuisinesSql()
    {
        $sql = "SELECT `cuisine` FROM `cuisines`";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetRestaurantCuisinesSql($input)
    {
        $stmt = $this->conn->prepare("SELECT `name` FROM `restaurant_cuisine` JOIN `restaurants` ON `restaurant_id` = restaurants.id JOIN `cuisines` ON `cuisine_id` = cuisines.id WHERE cuisines.cuisine = ?");
        $stmt->bind_param('s', $input);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function GetReservationDateSql($input)
    {
        $stmt = $this->conn->prepare("SELECT `date` FROM `food_schedule` JOIN `restaurants` ON `restaurant_id` = restaurants.id WHERE restaurants.name = ? GROUP BY `date`");
        $stmt->bind_param('s', $input);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function GetReservationTimeSql($name,$date)
    {
        $stmt = $this->conn->prepare("SELECT `time_start`, `time_end` FROM `food_schedule` JOIN `restaurants` ON `restaurant_id` = restaurants.id WHERE `date` = ? AND `name` = ?");
        $stmt->bind_param('ss', $date, $name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function GetRestaurantPriceSql($restaurant)
    {
        $stmt = $this->conn->prepare("SELECT `adult_price`, `child_price` FROM `restaurants` WHERE `name` = ?");
        $stmt->bind_param('s', $restaurant);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}