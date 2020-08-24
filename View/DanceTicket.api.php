<?php
include_once '../Controller/DanceLogic.php';
$controller = DanceLogic::InitController();

$date = $_POST['date'];
$artist = $_POST['artist'];
$result = $controller->GetSelectedTicket($date, $artist);
echo json_encode($result);
