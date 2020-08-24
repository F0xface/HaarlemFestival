<?php
include 'Conn.php';

class cmsDAO{
    private $conn;
    private $db;

    public function __construct() {
        $this->db = dbconnect::getInstance();
        $this->conn = $this->db->getConnection();
    }

    public function Register($name, $email, $password){
        $salt = bin2hex(random_bytes(20));
        $stmt = $this->conn->prepare("INSERT INTO volunteer (nameVolunteer, email, password, salt)VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, hash('sha512', $password . $salt), $salt);
        try {
            $stmt->Execute();
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function UserLogin($email, $password){
        $user = $this->GetUser($email);
        if($user->password === hash('sha512', $password . $user->salt)) {
            return true;
        }
        else{
            return false;
        }
    }

    public function GetUser($email){
        $stmt = $this->conn->prepare("SELECT * FROM volunteer WHERE email = ?");
        $stmt->bind_param("s", $email);
        try {
            $stmt->execute();
            $user = $stmt->get_result();
            return $user->fetch_object();
        }
        catch(PDOException $e){
            return null;
        }
    }

}
?>
