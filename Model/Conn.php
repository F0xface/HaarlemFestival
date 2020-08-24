<?php
    class dbconnect{

        private static $instance = null;
        private $conn;
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $db = 'haarlem_festival3';

        private function __construct(){
            $this->conn = new mysqli($this->host,$this->user, $this->pass, $this->db);
            $this->conn->set_charset('utf8');
        }

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new dbconnect;
            }
            return self::$instance;
        }

        public function getConnection(){
            return $this->conn;
        }
    }
?>