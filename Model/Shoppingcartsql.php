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

        public function substractHistory($amount, $language, $time){
            $sql = "UPDATE history_tours SET Seats_Left = Seats_Left - ? WHERE Languages LIKE ? AND Time LIKE ?";
            $stmt = mysqli_stmt_init($this->conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "sss", $amount, $language, $time);
                mysqli_stmt_execute($stmt);
                $result = $stmt->get_result();
            }
            return $result;
        }
    }

