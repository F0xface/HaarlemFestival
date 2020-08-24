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

    public function getInfo()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'info'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetInMood()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'GetInMood'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetHistory()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'HistoryTxt'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }
    public function GetFood()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'foodTxt'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetPicture1()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'molenPic'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetPicture2()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'kitchenPic'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }
    public function GetSponsors()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'sponsor%'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }
    public function GetDancePict()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'pagePic_Dance'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetFoodPict()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'pagePic_Food'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetJazzPict()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'pagePic_Jazz'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetHistoryPict()
    {
        $sql = "SELECT * FROM page_info WHERE `page` LIKE 'Index' AND description LIKE 'pagePic_History'";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

}
?>
