<?php
include_once '../Model/Programsql.php';
class ProgramLogic{
    private $d;
    public static $instance;

    private function __construct(){
        $this->d = new ProgramDAO();
    }

    public static function InitController(){
        if(!self::$instance){
            self::$instance = new ProgramLogic();
        }
        return self::$instance;
    }

    function GetDates()
    {
        $dates = $this->d->GetAllDatesSql();
        return $dates;
    }
}
