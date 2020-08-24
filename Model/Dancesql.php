<?php
include 'Conn.php';
class DanceSQL{

    private static $instance = null;
    private $db;
    private $conn;

    private function __construct() {
        $this->db = dbconnect::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new DanceSQL();
        }
        return self::$instance;
    }

    public function SelectArtistsSql(){
        $sql = "SELECT * FROM `artists`";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetDatesSql(){
        $sql = "SELECT `date` FROM `dance_schedule` GROUP BY `date` ORDER BY `date` ASC";
        $result = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $result;
    }

    public function GetInfoSql($date){
        $stmt = $this->conn->prepare('SELECT * FROM `dance_info` WHERE `date` = ?');
        $stmt->bind_param('s', $date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function GetScheduleSql($date){
        $stmt = $this->conn->prepare("SELECT `date`, `artist`, `time_start`, `time_finish`, `venue`, `price` FROM `dance_schedule` WHERE `date` = ? AND NOT `venue` = 'all' ORDER BY `time_start` ASC");
        $stmt->bind_param('s', $date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function ArtistsOnDaySql($date){
        $stmt = $this->conn->prepare("SELECT `artist` FROM `dance_schedule` WHERE `date` = ? AND NOT `venue` = 'all'");
        $stmt->bind_param('s', $date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function SelectedTicketSql($date, $artist){
        $stmt = $this->conn->prepare("SELECT * FROM `dance_schedule` WHERE `date` = ? AND `artist` = ?");
        $stmt->bind_param('ss', $date, $artist);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function SelectedAllDayTicketSql($date, $artists){
        $stmt = $this->conn->prepare("SELECT * FROM `dance_schedule` WHERE `date` = ? AND `artist` = ?");
        $stmt->bind_param('ss', $date, $artists);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function SelectedAllDaysTicketSql($allDaysTicket){
        $stmt = $this->conn->prepare("SELECT * FROM `dance_schedule` WHERE `artist` = ?");
        $stmt->bind_param("s", $allDaysTicket);
        $stmt->execute();
        $tickets = $stmt->get_result();
        return $tickets;
    }
}
?>