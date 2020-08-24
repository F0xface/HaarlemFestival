<?php
include_once '../Controller/DanceLogic.php';
$controller = DanceLogic::InitController();

$date = $_POST['date'];
$result = $controller->GetArtistsOnDay($date);
echo json_encode($result);