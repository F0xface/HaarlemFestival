<!doctype html>

<?php $thisPage = "Dance";?>

<?php
include_once '../Controller/DanceLogic.php';
    $controller = DanceLogic::InitController();
?>
<head>
    <link rel="stylesheet" href="../CSS/Dance.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<Body>
<?php
require "Header.php";
?>

<div id = "martin" >
    <div class = "tickets_button_a">
        <a id="ticketsButton" onclick="showTicketOrder()" href="#artists_button">
            Get tickets
        </a>
        <div class = "text-center">
            <?php
            $result = $controller->GetDates();
            while ($row = $result->fetch_assoc()) {
                $dayOfWeek = date('l', strtotime($row['date']));
                $month = date('F', strtotime($row['date']));
                $day = date('d', strtotime($row['date']));
                $buttonText = $dayOfWeek. ", " .$month ." ".$day."th";
                echo "<button id='".$row['date']."' class='day_buttons' onclick='showDay(this.id)'>".$buttonText."</button>";
            }
            ?>
            <br>
            <button id="artists_button" class="day_buttons" onclick="showArtists()">Artists</button>
        </div>
    </div>
</div>
<?php
echo "<div id = 'day_tables'>";
    $dates = $controller->GetDates();
    while ($row = $dates->fetch_assoc()) {
        echo "<div class= 'tables mx-auto w-50' id= '" . $row['date'] . "Table'>";
            echo "<table class='table table-striped table-dark'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Artist(s)</th><th>Start time</th><th>End time</th><th>Venue</th><th>Price</th>";
                    echo "</tr>";
                echo "</thead>";
            $daySchedule = $controller->GetSchedule($row['date']);
            while ($subRow = $daySchedule->fetch_assoc()) {
                echo "<tr><td>" . $subRow['artist'] . "</td><td>" . substr($subRow['time_start'], 0, 5) . "</td><td>" . substr($subRow['time_finish'], 0, 5) . "</td><td>" . $subRow['venue'] . "</td><td>€" . $subRow['price'] . ",-</td></tr>";
            }
            echo "</table>";
        echo "</div>";
        echo "</div>"; //close div day_tables//
        echo "<div class = 'text-center'>";
        $info = $controller->GetInfo($row['date']);
        while ($subRow = $info->fetch_assoc()) {
            echo "<div id = '".$row['date']."Info' class = 'info_cards mx-auto w-50'>";
                echo "<h1 class = 'info_title'>" . $subRow['info_title'] . "</h1>";
                echo "<h2 class = 'info_text'>" . $subRow['info_text'] . "</h2>";
                echo "<h1 class = 'info_extra'>" . $subRow['info_extra'] . "</h1>";
            echo "</div>";
        }
        echo"</div>";
    }
?>

<div id = "Artists" class = "tables">
    <div>
        <div class = "center_artists">
            <?php
            $result = $controller->GetArtists();
            show_artists($result);
            ?>
        </div>
    </div>
</div>

<div id = "OrderCard" class = "mx-auto tables">
    <div class = 'text-center'>
        <h1 id = 'cardHeadText'>Order your tickets:</h1>
        <h3 id = 'cardHeadSubText'>What kind of ticket would you like:</h3>
    </div>
    <h1 class = cardNumber>1.</h1>
    <form>
        <div id = 'ticketSelection' class = "input_row input_center">
            <div class = "input_row">
                <input type="radio" id="all_access" name="pass_type" onchange="showOptions()" value="all">
                <label for="all_access"> All-access pass</label>
            </div>
            <div class = "input_row">
                <input type="radio" id="custom_access" name="pass_type" onchange="showOptions()" value="custom">
                <label for="custom_access"> Custom access pass</label>
            </div>
        </div>
        <h1 class = "cardNumber">2.</h1>
        <div class = "text-center">
            <select id = "dateDropDown" class = "cardDropDown">
                <option value="0" selected disabled hidden>Choose date</option>
                <?php
                $result = $controller->GetDates();
                while ($row = $result->fetch_assoc()) {
                    echo "<option value =" . $row['date']. ">". $row['date']."</option>";
                }
                ?>
            </select>
        </div>
        <div class = 'text-center'>
            <select id="artistsDropDown" class = "cardDropDown">
                <option value="0" selected disabled hidden>Choose artist</option>
            </select>
        </div>
        <div class = 'text-center'>
            <button type='button' id = 'addToList' onclick = 'GetTicketInfo()'>Add to list</button>
        </div>
        <h3 class = 'cardNumber'>3.</h3>
        <table id = 'ticketBox'>
            <thead>
                <tr>
                    <th id = 'ticketDescription'>Ticket</th><th id = 'ticketAmount'>Amount</th><th id = 'ticketPrice'>Price</th>
                </tr>
            </thead>
            <!--JS puts ticket info here-->
        </table>
        <h2 id = 'totalPrice'>Total: €</h2>
        <div class = 'input_row input_center'>
            <button class = 'cardButtons' type = 'button' onclick='window.location.reload()'>Cancel</button>
            <button class = 'cardButtons' type = 'button' onclick = 'confirmButton()'>Add to cart</button>
        </div>
    </form>
</div>


<?php
function show_artists($result){
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($rows); $i++){
        if ($i % 2 === 0){
            echo "<div class = 'artists_row'><div class = 'artists_left_image'>";
            echo "<a class = 'artists_link text-decoration-none' href = '".$rows[$i]['info_link']."'><div class = 'artists_image' style='background-image: url(" . $rows[$i]["image_path"] . ");'>"
                    ."<div class = 'artists_name'>"
                        .$rows[$i]["name"]
                    ."</div>"
                ."</div></a>";
            echo "</div>";
        }
        else{
            echo "<div class = 'artists_right_image'>";
            echo "<a class = 'artists_link text-decoration-none' href = '".$rows[$i]['info_link']."'><div class = 'artists_image' style='background-image: url(" . $rows[$i]["image_path"] . "); '>"
                    ."<div class = 'artists_name'>"
                        .$rows[$i]["name"]
                    ."</div>"
                ."</div></a>";
            echo "</div></div>";
        }
    }
}
?>

<footer>
    <?php
    require "Footer.php";
    ?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../Controller/DanceScript.js"></script>
</Body>
</html>