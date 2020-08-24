<?php
include 'Conn.php';
class dao
{
    private $conn;
    private $db;

    public function __construct() {
        $this->db = dbconnect::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public function Select($table_name)
    {
        $sql = "SELECT * FROM $table_name ";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function getBands()
    {
        $sql = "SELECT * FROM jazzbands WHERE `name` NOT LIKE  '%All Access%'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function jazzSelectThursdaySql()
    {
        $sql = "SELECT * FROM jazzSchedule INNER JOIN jazzbands ON jazzbands.ID = jazzschedule.jazzbandID WHERE `Date` LIKE '2020-07-26'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }




    public function jazzSelectFridaySql()
    {
        $sql = "SELECT * FROM jazzSchedule INNER JOIN jazzbands ON jazzbands.ID = jazzschedule.jazzbandID WHERE `Date` LIKE '2020-07-27'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function jazzSelectSaturdaySql()
    {
        $sql = "SELECT * FROM jazzSchedule INNER JOIN jazzbands ON jazzbands.ID = jazzschedule.jazzbandID WHERE `Date` LIKE '2020-07-28'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function jazzSelectSundaySql()
    {
        $sql = "SELECT * FROM jazzSchedule INNER JOIN jazzbands ON jazzbands.ID = jazzschedule.jazzbandID WHERE `Date` LIKE '2020-07-29'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }



    public function getJazzSongs($scheduleID)
    {
        $sql = "SELECT * FROM jazzSchedule INNER JOIN jazzbands ON jazzbands.ID = jazzschedule.jazzbandID WHERE `scheduleID` LIKE '$scheduleID'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }
    public function getAllJazzSongs()
    {
        $sql = "SELECT * FROM jazzSchedule INNER JOIN jazzbands ON jazzbands.ID = jazzschedule.jazzbandID";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function getDay()
    {
        $sql = "SELECT DISTINCT `day` , `date` FROM jazzSchedule";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function getHeaderContent()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Jazz' AND description LIKE 'banner text'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function getHeaderTitle()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Jazz' AND description LIKE 'banner title'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function getHeaderImg()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Jazz' AND description LIKE 'header img'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function getHeaderBanner()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Jazz' AND description LIKE 'banner'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }



    public function singleticketSql(){
        $sql = "SELECT DISTINCT Price FROM jazzschedule";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }



    public function datebuttonsSql(){
        $sql = "SELECT DISTINCT `Date` FROM jazzschedule";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }




}




?>