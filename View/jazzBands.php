<?php
class jazzBands{
    protected $id;
    protected $name;
    protected $fbLink;

    public function getBands(){
        $id = 0;
        $name = "";
        $fbLink = "";

        $stmt = $this->connect()->prepare("SELECT * FROM jazzbands where id=? AND name=? AND fblink=?");
        $stmt->execute([$id, $name, $fbLink]);

        if ($stmt->rowCount()){
            while ($row = $stmt->fetch()) {
                return $row['naam'. 'fbLink'];
            }
        }
    }




}
?>
