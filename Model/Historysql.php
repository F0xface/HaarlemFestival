<?php
include 'Conn.php';

class Historysql
{
    private static $instance = null;
    private $db;
    private $conn;

    public function __construct()
    {
        $this->db = dbconnect::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Historysql();
        }
        return self::$instance;
    }

    public function introductiontxtSql()
    {
        $sql = "SELECT content FROM `page_info` WHERE description LIKE 'Introduction text' AND page LIKE 'Historic'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function maptxtSql()
    {
        $sql = "SELECT content FROM `page_info` WHERE description LIKE 'map text' AND page LIKE 'Historic'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function maplinkSql()
    {
        $sql = "SELECT content, link FROM `page_info` WHERE description LIKE 'map link' AND page LIKE 'Historic'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function programtxtSql()
    {
        $sql = "SELECT content FROM `page_info` WHERE description LIKE 'program txt' AND page LIKE 'Historic'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function datebuttonsSql()
    {
        $sql = "SELECT Day, Time FROM `history_tours` GROUP BY Day ORDER BY Time";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function SelectThursdaySql()
    {
        $sql = "SELECT `Time`, `Languages`, `Seats_Left` FROM `history_tours` WHERE `Time` LIKE '2020-07-26 1_:00:00'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function SelectFridaySql()
    {
        $sql = "SELECT `Time`, `Languages`, `Seats_Left` FROM `history_tours` WHERE `Time` LIKE '2020-07-27 1_:00:00'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function SelectSaturdaySql()
    {
        $sql = "SELECT `Time`, `Languages`, `Seats_Left` FROM `history_tours` WHERE `Time` LIKE '2020-07-28 1_:00:00'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function SelectSundaySql()
    {
        $sql = "SELECT `Time`, `Languages`, `Seats_Left` FROM `history_tours` WHERE `Time` LIKE '2020-07-29 1_:00:00'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function singleticketSql()
    {
        $sql = "SELECT DISTINCT Price FROM `history_tours`";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function familyticketSql()
    {
        $sql = "SELECT DISTINCT Family_Price FROM `history_tours`";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function minusticketsSql()
    {
        $sql = "SELECT DISTINCT Family_Price FROM `history_tours`";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
    }
}
