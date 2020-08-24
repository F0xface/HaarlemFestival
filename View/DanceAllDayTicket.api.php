<?php
include_once '../Controller/DanceLogic.php';
$controller = DanceLogic::InitController();

$date = $_POST['date'];
if($date === 'all_days'){
    $all_days = $_POST['artists'];
    $result = $controller->GetAllDaysTicket($all_days);
}
else{
    $artists = $_POST['artists'];
    $result = $controller->GetAllDayTicket($date, $artists);
}
echo json_encode($result);