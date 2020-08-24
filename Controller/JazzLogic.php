<?php

include_once '../Model/jazzsql.php';

if (isset($_POST['cart_add'])) {
    session_start();
    $_SESSION['cart'][] = array(
        'event' => "Jazz",
        'amount' => $_POST['amount'],
        'date' => $_POST['date'],
        'time' => "10:00",
        'price' => ($_POST['amount'] * 15.00));

    header('Location: ../View/jazz.php');
}

if (!function_exists('Select')) {

            function SELECT($table_Name)
            {
                $d = new dao();
                $result = $d->SELECT($table_Name);
                return $result;
            }
        }

if (!function_exists('getBands')) {
    function getBands()
    {
        $d = new dao();
        $result = $d->getBands();
        return $result;
    }
}




if (!function_exists('jazzSelectThursday')) {
    function jazzSelectThursday(){
        $d = new dao();
        $result = $d -> jazzSelectThursdaySql();
        return $result;
    }
}



if (!function_exists('jazzSelectFriday')) {
    function jazzSelectFriday(){
        $d = new dao();
        $result = $d -> jazzSelectFridaySql();
        return $result;
    }
}

if (!function_exists('jazzSelectSaturday')) {
    function jazzSelectSaturday(){
        $d = new dao();
        $result = $d -> jazzSelectSaturdaySql();
        return $result;
    }
}

if (!function_exists('jazzSelectSunday')) {
    function jazzSelectSunday(){
        $d = new dao();
        $result = $d -> jazzSelectSundaySql();
        return $result;
    }
}

if (!function_exists('getJazzSongs')) {
    function getJazzSongs($scheduleID){
        $d = new dao();
        $result = $d -> getJazzSongs($scheduleID);
        return $result;
    }
}

if (!function_exists('getAllJazzSongs')) {
    function getAllJazzSongs(){
        $d = new dao();
        $result = $d -> getAllJazzSongs();
        return $result;
    }
}

if (!function_exists('getDay')) {
    function getDay(){
        $d = new dao();
        $result = $d -> getDay();
        return $result;
    }
}


if (!function_exists('getHeaderContent')) {
    function getHeaderContent(){
        $d = new dao();
        $result = $d -> getHeaderContent();
        return $result;
    }
}

if (!function_exists('getHeaderTitle')) {
    function getHeaderTitle(){
        $d = new dao();
        $result = $d -> getHeaderTitle();
        return $result;
    }
}

if (!function_exists('getHeaderImg')) {
    function getHeaderImg(){
        $d = new dao();
        $result = $d -> getHeaderImg();
        return $result;
    }
}

if (!function_exists('getHeaderBanner')) {
    function getHeaderBanner(){
        $d = new dao();
        $result = $d -> getHeaderBanner();
        return $result;
    }
}


if (!function_exists('singleticket')) {
    function singleticket()
    {
        $d = new dao();
        $result = $d->singleticketSql();
        return $result;
    }
}


if (!function_exists('datebuttons')) {
    function datebuttons()
    {
        $d = new dao();
        $result = $d->datebuttonsSql();
        return $result;
    }
}






?>