<?php
include 'Conn.php';
class ProgramDAO
{
    private $conn;
    private $db;

    public function __construct() {
        $this->db = dbconnect::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public function GetAllDatesSql(){
        $sql = "SELECT date FROM ( SELECT date FROM dance_schedule UNION SELECT DATE(Time) as date FROM history_tours UNION SELECT date FROM jazzschedule UNION SELECT date FROM food_schedule )AS sq ORDER BY date ASC";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }
}