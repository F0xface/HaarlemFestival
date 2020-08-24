<!DOCTYPE HTML>
<?php
include_once '../Controller/ProgramLogic.php';
$thisPage = "Program";
$controller = ProgramLogic::InitController();
?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/Program.css">
    <script defer src="../Controller/ProgramScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
require "Header.php";
?>
<div id = "program_card">
    <div id = 'push'></div>
    <h1 class = "text-center">Program</h1>
    <h3 class = "text-center">Here you can find your program, you can add events to your program by<br>adding the desired event to your shopping cart.<br>
        This way you can have a overview of all the events that you want to attend.</h3>
    <div id = "schedule_buttons">
        <?php
        if (isset($_SESSION['cart'])) {
            $cartItems = $_SESSION['cart'];
            foreach($cartItems as $item){
                $dates[] = $item['date'];
            }
            $uniqueDates = array_unique($dates);
            usort($uniqueDates, "sortByDate");
            for($i= 0; $i < sizeof($uniqueDates); $i++){
                if($i === 0){
                    echo "<button  id = '" . $uniqueDates[$i] . "' class = 'date_buttons first_button' OnClick =  'color_buttons(this.id)'>" .$uniqueDates[$i]. "</button>";
                }
                else {
                    echo "<button  id = '" . $uniqueDates[$i] . "' class = 'date_buttons' OnClick =  'color_buttons(this.id)'>" . $uniqueDates[$i] . "</button>";
                }
            }
            usort($cartItems, "SortByTime");
            echo "</div>";
            echo "<div id = 'schedule'>";
            foreach ($cartItems as $cart) {
                echo "<div class='event ".$cart['date']."'>";
                echo "<p>".$cart['event']." event</p>";
                echo "<p>".$cart['date']."</p>";
                echo "<p>".$cart["time"]."</p>";
                switch ($cart['event']) {
                    case "Dance":
                        if($cart['artist'] === 'all_artists'){
                            echo "<p>All event long</p>";
                        }
                        else if($cart['artist'] === 'all'){
                            echo "<p>All day long</p>";
                        }
                        else {
                            echo "<p>" . $cart['artist'] . "</p>";
                        }
                        break;
                    case "Jazz":
                        echo "<p>".$cart['band']."</p>";
                        break;
                    case "Food":
                        echo "<p>".$cart['restaurant']."</p>";
                        break;
                    case "History":
                        echo "<p>".$cart['language']."</p>";
                        break;
                }
                echo "</div>";
            }
        }
        else {
            echo "<p>Your shopping cart seems to be empty, add something to show it in your schedule</p>";
        }
        ?>
    </div>
</div>
<?php
function sortByTime($a, $b) {
    return (str_replace(":", "", $a["time"]) - str_replace(":", "", $b["time"]));
}

function sortByDate($a, $b) {
    return strtotime($a) - strtotime($b);
}

require "Footer.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../Controller/ProgramScript.js"></script>
</body>
