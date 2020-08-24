<?php
include_once '../Model/Historysql.php';

class HistoryLogic
{
    private $d;
    public static $instance;

    private function __construct()
    {
        $this->d = Historysql::getInstance();
    }

    public static function InitController()
    {
        if (!self::$instance) {
            self::$instance = new HistoryLogic();
        }
        return self::$instance;
    }

    function addToCart()
    {
        session_start();
        if (($_POST['amount'] * 17.50) + ($_POST['familyamount'] * 60.00) > 0) {
            $_SESSION['cart'][] = array(
                'event' => "History",
                'amount' => $_POST['amount'] + ($_POST['familyamount'] * 4),
                'date' => $_POST['SelectDate'],
                'time' => $_POST['SelectTime'],
                'price' => ($_POST['amount'] * 17.50) + ($_POST['familyamount'] * 60.00),
                'language' => $_POST['language']);
        }
    }

    function introductiontxt()
    {
        $result = $this->d->introductiontxtSql();
        return $result;
    }

    function maptxt()
    {
        $result = $this->d->maptxtSql();
        return $result;
    }


    function maplink()
    {
        $result = $this->d->maplinkSql();
        return $result;
    }


    function programtxt()
    {
        $result = $this->d->programtxtSql();
        return $result;
    }

    function datebuttons()
    {
        $result = $this->d->datebuttonsSql();
        return $result;
    }

    function SelectThursday()
    {
        $result = $this->d->SelectThursdaySql();
        return $result;
    }

    function SelectFriday()
    {
        $result = $this->d->SelectFridaySql();
        return $result;
    }

    function SelectSaturday()
    {
        $result = $this->d->SelectSaturdaySql();
        return $result;
    }

    function SelectSunday()
    {
        $result = $this->d->SelectSundaySql();
        return $result;
    }

    function singleticket()
    {
        $result = $this->d->singleticketSql();
        return $result;
    }

    function familyticket()
    {
        $result = $this->d->familyticketSql();
        return $result;
    }
}