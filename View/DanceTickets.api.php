<?php
include_once '../Controller/DanceLogic.php';
include '../View/Dance.php';
$controller = DanceLogic::InitController();

$ticket = new Ticket($_POST['date'], $_POST['time'], $_POST['amount'], $_POST['price'], $_POST['artist']);
$controller->SendTicketToCart($ticket);
class Ticket{
    public function __construct($date, $time, $amount, $price, $artist)
    {
        $this->date = $date;
        $this->time = $time;
        $this->amount = $amount;
        $this->price = $price;
        $this->artist = $artist;
    }
}


