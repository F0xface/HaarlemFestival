<!DOCTYPE HTML>
<?php
$thisPage="Jazz";
//require "Header.php";
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <link rel="stylesheet" type="text/css" href="../CSS/Jazz.css">
    <script defer src="../Controller/Jazzscript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../Controller/Jazzscript.js../db-to-js.php"></script>
</head>
<body>
<main>

    <?php
    require '../Controller/JazzLogic.php';

//          get images
        @$resultsHeaderTitle = getHeaderImg();
        while ($row = $resultsHeaderTitle-> fetch_assoc()){
            @$headerTitle = $row['content'];
            echo '<img class="getimages"  src="' . @$headerTitle . '" alt="">';
        }

        @$resultsHeaderBanner = getHeaderBanner();
        while ($row = $resultsHeaderBanner-> fetch_assoc()){
            @$headerBanner = $row['content'];
            echo '<img class="getimages"  src="' . @$headerBanner . '" alt="">';
        }
?>


<!--//        get banner title/banner content-->
        <div class = "BannerText">
            <?php
        @$resultsHeaderTitle = getHeaderTitle();
        while ($row = $resultsHeaderTitle-> fetch_assoc()){
            @$headerTitle = $row['content'];
            echo '<h1>' . @$headerTitle. '</h1>';
        }
        echo '<p>--------------------------------------------------------------------------</p>';
        @$resultsHeaderContent = getHeaderContent();
        while ($row = $resultsHeaderContent-> fetch_assoc()){
            @$headerTitle = $row['content'];
            echo '<p>' . @$headerTitle. '</p>';
        }
        ?>
        </div>

<!--//          show titles-->
    <div class = "Bands">
    <h1 class = Titles_I_U> BANDS</h1>
    </div>


<!--//          show all buttons with facebook links-->
    <table id="SelectBands">
        <?php
    $results = getBands();
    show_table_bands($results);
    ?>
    </table>

<!--//          show titles-->
    <div class = "Jazz Program">
    <h1 class = Titles_I_U>Jazz Program</h1>
    </div>

<!--create buttons with day and date-->
    <?php
    $resultsDays = getDay();
    foreach ($resultsDays as $row)
    {
        @$date = $row["date"];
        $dateTabel = date('d/m', strtotime($date));
        @$day = $row["day"];
        $Shtable = "jazzShow".$day;
        echo "<button type=\"button\" id=\"btn_$day\" class=\"btn_$day\" onclick=\"$Shtable()\">$day<br>$dateTabel</button>";
    }

//         get table
    echo '<table id="thursday">';
    echo '<tr>';
    echo '<th>Date</th>';
    echo '<th>Time</th>';
    echo '<th>Band</th>';
    echo '<th>Hall</th>';
    echo '<th>Location</th>';
    echo '</tr>';
    $result = jazzSelectThursday();
    show_table_Program($result);
    echo '</table>';

//         get table
    echo '<table id="friday">';
    echo '<tr>';
    echo '<th>Date</th>';
    echo '<th>Time</th>';
    echo '<th>Band</th>';
    echo '<th>Hall</th>';
    echo '<th>Location</th>';
    echo '</tr>';
    $result = jazzSelectFriday();
    show_table_Program($result);
    echo '</table>';

//         get table
    echo '<table id="saturday">';
    echo '<tr>';
    echo '<th>Date</th>';
    echo '<th>Time</th>';
    echo '<th>Band</th>';
    echo '<th>Hall</th>';
    echo '<th>Location</th>';
    echo '</tr>';
    $result = jazzSelectSaturday();
    show_table_Program($result);
    echo '</table>';

//         get table
    echo '<table id="sunday">';
    echo '<tr>';
    echo '<th>Date</th>';
    echo '<th>Time</th>';
    echo '<th>Band</th>';
    echo '<th>Hall</th>';
    echo '<th>Location</th>';
    echo '</tr>';
    $result = jazzSelectSunday();
    show_table_Program($result);
    echo '</table>';

//          create/show table
    function show_table_bands($results){
        $count = 0;
        while ($row = $results-> fetch_assoc()){
            echo "<input type=\"button\" class=\"btn_Bands\" value=\"$row[name]\" onclick=\"window.open('$row[fbLink]')\" />";
            $count++;
            if($count % 5 == 0){
                echo "</br>";
            }
        }
        echo "</table>";
    }


//             get/create all songs
    function show_table_Songs($resultSongs){
        $resultArray = array();
        while ($row = $resultSongs-> fetch_assoc()){
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["Songs"] . "</td></tr>";
        }
        echo "</table>";
    }


//          show all jazz songs
    $resultSongs = getAllJazzSongs();
    $count = 1;
    foreach ($resultSongs as $schedule){
        $count = $schedule["scheduleID"];
        echo '<div class="modal" id="modal'.$count.'">';
        echo '<div class="modal-header">';
        echo '<div class=scheduleID> ' . @$schedule[name] .' </div>';
        echo '<button data-close-button class="close-button">&times;</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<table id="songs">';
        echo '<tr>';
        echo '<th>Songs : </th>';
        echo '<td>' . (@$schedule[Songs]) . '</td>';
        echo '</tr>';
        echo '</table>';
        echo '<table id="songs">';
        echo '<tr>';
        echo '<th>Price :</th>';
        if (@$schedule[Price] == 10 || @$schedule[Price] == 15){
            echo '<td> €' . number_format(@$schedule[Price],2) . '</td>';
        }
        else if (@$schedule[Price] == 0){
            echo '<td>Free for all visitors. No reservation needed</td>';
        }
        else {
            echo '<td> €' . number_format(@$schedule[Price],2) . '</td>';
        }
        echo '<th> </br> </th>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '<div id="overlay"></div>';
    }

//          get/create/show program table
    function show_table_Program($results){
        $count = 0;
        while ($row = $results-> fetch_assoc()){
            $count = $row["scheduleID"];

            $date = $row["date"];
            $dateTabel = date('d/m/Y', strtotime($date));

            $timeStart = $row["timestart"];
            $timeStartTabel = date('H:i', strtotime($timeStart));

            $timeFinish = $row["timefinish"];
            $timeFinishTabel = date('H:i', strtotime($timeFinish));


            echo "<td onclick=button data-modal-target=\"#modal$count\">" . $dateTabel . "</td>";
            echo "<td onclick=button data-modal-target=\"#modal$count\">" . $timeStartTabel. " - ". $timeFinishTabel. "</td>";
            echo "<td onclick=button data-modal-target=\"#modal$count\">" . $row["name"] . "</td>";
            echo "<td onclick=button data-modal-target=\"#modal$count\">" . $row["hall"] . "</td>";
            echo "<td onclick=button data-modal-target=\"#modal$count\">" . $row["location"] . "</td></tr>";
        }
        echo "</table>";
    }

//
//    echo '<button class="btn_GetYourTicket" id="GetYourTicket" data-modal-target="#modal">Get Your Ticket!</button>';
//    echo '<div class="modal" id="modal">';
//    echo '<form action="../Controller/JazzLogic.php" method="post">';
//    echo '<div class="modal-header">';
//    echo '<div class="title">Get Your Ticket</div>';
//    echo '<button data-close-button class="close-button">&times;</button>';
//    echo '</div>';
//    echo '<div class="modal-body">';
//    echo '<div class="content">';
//    echo '<br>';
//    echo '<p1 class="txt_tickettype">Pick Ticket Type:</p1>';
//    echo '<select id="options" class="slct_tickettype">';
//    echo '';
//    echo '<option value="" disabled selected>Select an option</option>';
//    echo '<option value="Option 1">Solo Ticket</option>';
//    echo '<option value="Option 2">Combo Ticket</option>';
//    echo '</select>';
//    echo '<br>';
//    echo '<p class="txt_day">Select Day:</p>';
//    echo '<label class="datetime" for="SelectDate"></label>';
//    echo '<select id="SelectDate" class="slct_date" name="SelectDate">';
//    echo '<option hidden disabled selected value>Select a date...</option>';
//    $resultsDays = getDay();
//    while ($row = mysqli_fetch_assoc($resultsDays)) {
//        @$day = $row["day"];
//        @$date = $row["date"];
//        $dateTabel = date('d/m/Y', strtotime($date));
//        echo "<option value='$dateTabel'>$dateTabel</option>";
//    }
//    echo '</select>';
//    echo '<br>';
//    echo '</select>';
//    echo '<label class="txt_band" for="band">Pick Band</label>';
//    echo '<select class="slct_band" name="Band">';
//    echo '';
//    echo '<option value ="Gumbo Kings">Gumbo Kings</option>';
//    echo '<option value ="evolve">evolve</option>';
//    echo '<option value ="njtam rosie">njtam rosie</option>';
//    echo '<option value ="tom thomson assemble">tom thomson assemble</option>';
//    echo '</select>';
//    echo '<br>';
//    echo '<p1 class="txt_price">Amount of tickets:</p1>';
//    echo '<input id="amount" class="slct_amount" name="amount" type="number" min="1" max="999" value="0" step="1" ondrop="return false;" onchange="SingelticketPrice(this)" \>';
//    echo '</select>';
//    echo '<br>';
//    echo '<p1 class="txt_price">Price : </p1>';
//    echo '<p1 class="slct_price" id="singleprice">€0.00</p1>';
//    echo '<div>';
//    echo '<button type="button" class="btn_cancelbuy" data-close-button >Cancel</button>';
//    echo '<button type="submit" class="btn_finishbuy" name="cart_add">Add to cart</button>';
//    echo '</div>';
//    echo '<div id="confirmCart">';
//    echo '<form action="../View/Shoppingcart.php">';
//    echo '<button class="btn_submit" type="submit">Go to cart</button>';
//    echo '</form>';
//    echo '</div>';
//    echo '<br>';
//    echo '</div>';
//    echo '<table>';
//    echo '<tr>';
//    echo '</tr>';
//    echo '</table>';
//    echo '</div>';
//    echo '</div>';
//    echo '<div id="overlay"></div>';

    ?>

    <button class="btn_GetYourTicket" id="GetYourTicket" data-modal-target="#modal">Get Your Ticket!</button>
    <div class="modal" id="modal">
    <form action="../Controller/JazzLogic.php" method="post">
    <div class="modal-header">
    <div class="title">Get Your Ticket</div>
    <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
    <div class="content">
    <br>
    <p1 class="txt_tickettype">Pick Ticket Type:</p1>
    <select id="options" class="slct_tickettype">
    <option value="" disabled selected>Select an option</option>
    <option value="Option 1">Solo Ticket</option>
    <option value="Option 2">Combo Ticket</option>
    </select>
    <br>
    <p class="txt_day">Select Day:</p>
    <label class="datetime" for="SelectDate"></label>
    <select id="SelectDate" class="slct_date" name="SelectDate">
    <option hidden disabled selected value>Select a date...</option>
        <?php
        $resultsDays = getDay();
        while ($row = mysqli_fetch_assoc($resultsDays)) {
            @$day = $row["day"];
            @$date = $row["date"];
            $dateTabel = date('d/m/Y', strtotime($date));
            echo" <option value='$dateTabel'>$dateTabel</option>";
                        }
?>



    </select>
    <br>
    </select>
   <label class="txt_band" for="band">Pick Band</label>
   <select class="slct_band" name="Band">
   <option value ="Gumbo Kings">Gumbo Kings</option>
   <option value ="evolve">evolve</option>
   <option value ="njtam rosie">njtam rosie</option>
   <option value ="tom thomson assemble">tom thomson assemble</option>
   </select>
   <br>
   <p1 class="txt_price">Amount of tickets:</p1>
   <input id="amount" class="slct_amount" name="amount" type="number" min="1" max="999" value="0" step="1" ondrop="return false;" onchange="SingelticketPrice(this)" \>
   </select>
   <br>
   <p1 class="txt_price">Price : </p1>
   <p1 class="slct_price" id="singleprice">€0.00</p1>
   <div>
   <button type="button" class="btn_cancelbuy" data-close-button >Cancel</button>
   <button type="submit" class="btn_finishbuy" name="cart_add">Add to cart</button>
   </div>
   <div id="confirmCart">
   <form action="../View/Shoppingcart.php">
   <button class="btn_submit" onclick="window.location.href = '../View/Shoppingcart.php';">Go to cart</button>
   </form>
   </div>
   <br>
   </div>
   <table>
   <tr>
   </tr>
   </table>
   </div>
   </div>
   <div id="overlay"></div>



    <br>
    <br>
    <br>
    <br>
    <br>

</main>
<?php
require "Footer.php";
?>
</body>
</html>