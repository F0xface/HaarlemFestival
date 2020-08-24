<?php
include_once '../Model/Dancesql.php';

class DanceLogic
{

    private $d;
    private static $instance;

    private function __construct(){
        $this->d = DanceSQL::getInstance();
    }

    public static function InitController(){
        if(!self::$instance){
            self::$instance = new DanceLogic();
        }
        return self::$instance;
    }

    public function SendTicketToCart($ticket)
    {
        session_start();
        $_SESSION['cart'][] = array(
            'event' => "Dance",
            'date' => $ticket->date,
            'amount' => $ticket->amount,
            'time' => $ticket->time,
            'price' => $ticket->price,
            'artist' => $ticket->artist
        );
    }

    public function GetArtists()
    {
        $result = $this->d->SelectArtistsSql();
        return $result;
    }

    public function GetSchedule($date)
    {
        $result = $this->d->GetScheduleSql($date);
        return $result;
    }

    public function GetInfo($date)
    {
        $result = $this->d->GetInfoSql($date);
        return $result;
    }

    public function GetDates()
    {
        $result = $this->d->GetDatesSql();
        return $result;
    }

    public function GetArtistsOnDay($date)
    {
        $result = $this->d->ArtistsOnDaySql($date);
        $artists = $result->fetch_all(MYSQLI_ASSOC);
        return $artists;
    }

    public function GetSelectedTicket($date, $artist)
    {
        $result = $this->d->SelectedTicketSql($date, $artist);
        $tickets = $result->fetch_all(MYSQLI_ASSOC);
        return $tickets;
    }

    public function GetAllDayTicket($date, $artists)
    {
        $result = $this->d->SelectedAllDayTicketSql($date, $artists);
        $tickets = $result->fetch_all(MYSQLI_ASSOC);
        return $tickets;
    }

    public function GetAllDaysTicket($all_days)
    {
        $result = $this->d->SelectedAllDaysTicketSql($all_days);
        $tickets = $result->fetch_all(MYSQLI_ASSOC);
        return $tickets;
    }
}

