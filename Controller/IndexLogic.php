<?php

include_once '../Model/Indexsql.php';

if (!function_exists('getInfo')) {
    function getInfo(){
        $d = new dao();
        $result = $d -> getInfo();
        return $result;
    }
}


if (!function_exists('GetInMood')) {
    function GetInMood(){
        $d = new dao();
        $result = $d -> GetInMood();
        return $result;
    }
}

if (!function_exists('GetHistory')) {
    function GetHistory(){
        $d = new dao();
        $result = $d -> GetHistory();
        return $result;
    }
}

if (!function_exists('GetFood')) {
    function GetFood(){
        $d = new dao();
        $result = $d -> GetFood();
        return $result;
    }
}


if (!function_exists('GetPicture1')) {
    function GetPicture1(){
        $d = new dao();
        $result = $d -> GetPicture1();
        return $result;
    }
}

if (!function_exists('GetPicture2')) {
    function GetPicture2(){
        $d = new dao();
        $result = $d -> GetPicture2();
        return $result;
    }
}

if (!function_exists('GetSponsors')) {
    function GetSponsors(){
        $d = new dao();
        $result = $d -> GetSponsors();
        return $result;
    }
}

if (!function_exists('GetDancePict')) {
    function GetDancePict(){
        $d = new dao();
        $result = $d -> GetDancePict();
        return $result;
    }
}

if (!function_exists('GetFoodPict')) {
    function GetFoodPict(){
        $d = new dao();
        $result = $d -> GetFoodPict();
        return $result;
    }
}

if (!function_exists('GetJazzPict')) {
    function GetJazzPict(){
        $d = new dao();
        $result = $d -> GetJazzPict();
        return $result;
    }
}

if (!function_exists('GetHistoryPict')) {
    function GetHistoryPict(){
        $d = new dao();
        $result = $d -> GetHistoryPict();
        return $result;
    }
}

















?>
