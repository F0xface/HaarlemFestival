<!DOCTYPE HTML>
<?php $thisPage="History";?>
<html lang="en">
<head>
    <title>Haarlem Festival: History</title>
    <link rel="stylesheet" href="../CSS/History.css">
    <script type="text/javascript" src="../Controller/Javascript.js"></script>
</head>
<body>
<?php
require "Header.php";
require '../Controller/HistoryLogic.php';
$controller = HistoryLogic::InitController();

if (isset($_POST['cart_add'])){
    $controller->addToCart();
}
?>

<main>
    <div>
        <img class="Molen" src="../img/History/Molen_oud_2.jpg" alt="">
        <div class="introduction">
            <h1>History:</h1>
            <?php
            $result = $controller->introductiontxt();
            while ($row = mysqli_fetch_assoc($result)) {
                $stringTest = $row['content'];
                echo "<p>$stringTest </p>";
            }
            ?>
        </div>
    </div>

    <div>
        <img class="Map" src="../img/History/Map.PNG" alt="">
        <div class="map_des">
            <?php
            $result = $controller->maptxt();
            while ($row = mysqli_fetch_assoc($result)) {
                $stringTest = $row['content'];
                echo "<h1>$stringTest</h1>";
            }

            $result = $controller->maplink();
            while ($row = mysqli_fetch_assoc($result)) {
                $stringTest = $row['content'];
                $links = $row['link'];
                echo "<a href='$links' target='_blank'>$stringTest</a><br>";
            }
            ?>
        </div>
    </div>

    <div class="program">
        <h1>Program:</h1>
        <?php
        $result = $controller->programtxt();
        while ($row = mysqli_fetch_assoc($result)) {
            $stringTest = $row['content'];
            echo "<p>$stringTest </p>";
        }

        $result = $controller->datebuttons();
        while ($row = mysqli_fetch_assoc($result)) {
            $Day = $row['Day'];
            $Time = date_create($row['Time']);
            $Date = date_format($Time, "n-j");
            $Shtable = "show" . $Day;
            echo " <button id=\"btn_$Day\" class=\"date_selector\" type=\"button\" onclick=\"$Shtable()\">$Day <br> $Date  </button>";
        }
        ?>

        <table class="tour_table" id="Thursday">
            <tr>
                <th class="tour_time">Time</th>
                <th class="tour_language">Language</th>
                <th class="tour_seats">Seats Left</th>
            </tr>
            <?php
            $result = $controller->SelectThursday();
            show_table($result);
            ?>
        </table>

        <table class="tour_table" id="Friday">
            <tr>
                <th class="tour_time">Time</th>
                <th class="tour_language">Language</th>
                <th class="tour_seats">Seats Left</th>
            </tr>
            <?php
            $result = $controller->SelectFriday();
            show_table($result);
            ?>
        </table>

        <table class="tour_table" id="Saturday">
            <tr>
                <th class="tour_time">Time</th>
                <th class="tour_language">Language</th>
                <th class="tour_seats">Seats Left</th>
            </tr>
            <?php
            $result = $controller->SelectSaturday();
            show_table($result);
            ?>
        </table>

        <table class="tour_table" id="Sunday">
            <tr>
                <th class="tour_time">Time</th>
                <th class="tour_language">Language</th>
                <th class="tour_seats">Seats Left</th>
            </tr>
            <?php
            $result = $controller->SelectSunday();
            show_table($result);
            ?>
        </table>

        <?php
        function show_table($result)
        {
            while ($row = $result->fetch_assoc()) {
                $Time = date_create($row["Time"]);
                echo "<tr><td>" . date_format($Time, "H:i") . "</td><td>" . $row["Languages"] . "</td><td>" . $row["Seats_Left"] . "</td></tr>";
            }
            echo "</table>";
        }

        ?>
        <form action="Shoppingcart.php">
            <button id="gotocart" type="submit">Go to cart</button>
        </form>
        <button id="gettickets" type="button" onclick="showOrdertickets()">Get your tickets!</button>
    </div>

    <div class="order_tickets" id="id_order_tickets">
        <form action="History.php" method="post">
            <h1>Order your tickets:</h1>
            <label class="datetime" for="SelectDate">Select Day:</label>
            <select id="SelectDate" name="SelectDate">
            <option hidden disabled selected value>Select a date...</option>
            <?php
            $result = $controller->datebuttons();
            while ($row = mysqli_fetch_assoc($result)) {
                $Day = $row['Day'];
                $Time = date_create($row['Time']);
                $Date = date_format($Time, "Y-m-d");
                echo "<option value='$Date'>$Day ($Date)</option>";
            }
            ?>
            </select>
            <br>

            <label class="datetime" for="SelectTime">Select Time:</label>
            <select id="SelectTime" name="SelectTime">
                <option hidden disabled selected value>Select a time...</option>
                <option value="10:00">10:00:00</option>
                <option value="13:00">13:00:00</option>
                <option value="16:00">16:00:00</option>
            </select>
            <hr>

            <input type="radio" name="language" value="english" id="English" checked>
            <label for="English" class="selectlanguage">English</label>
            <p>12</p>
            <p class="seat_text">Seats left</p>
            <br>
            <input type="radio" name="language" value="dutch" id="Dutch">
            <label for="Dutch" class="selectlanguage">Dutch</label>
            <p>12</p>
            <p class="seat_text">Seats left</p>
            <br>
            <input type="radio" name="language" value="chines" id="Chinese">
            <label for="Chinese" class="selectlanguage">Chinese</label>
            <p>12</p>
            <p class="seat_text">Seats left</p>
            <hr>

            <?php
            $result = $controller->singleticket();
            while ($row = mysqli_fetch_assoc($result)) {
                $stringTest = $row['Price'];
                echo "<label  class=\"amount_select\" for=\"amount\" id=\"amount_lbl\">Normal Ticket: (€$stringTest) </label>";
            }
            ?>

            <select id="amount" name="amount" onchange="SingelticketPrice(this); TotalticketPrice()">
                <?php
                for ($i = 0; $i <= 12; $i++){
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            <p class="price" id="first_euro">€</p>
            <p class="price" id="singleprice">0.00</p>

            <br>

            <?php
            $result = $controller->familyticket();
            while ($row = mysqli_fetch_assoc($result)) {
                $stringTest = $row['Family_Price'];
                echo "<label  class=\"amount_select\" for=\"familyamount\" id=\"familyamount_lbl\">Family Ticket: (€$stringTest) <br> (max 4 persons)</label>";
            }
            ?>

            <select id="familyamount" name="familyamount" onchange="FamilyticketPrice(this); TotalticketPrice()">
                <?php
                    for ($i = 0; $i <= 3; $i++){
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>

            <p class="price" id="second_euro">€</p>
            <p class="price" id="familyprice">0.00</p>

            <hr id="totalline">

            <p class="totaltxt">Total:</p>
            <p class="price" id="third_euro">€</p>
            <p class="price" id="totalprice">0.00</p>
            <hr class="lastline">

            <div>
                <button type="button" class="endbuy" onclick="hideOrdertickets()">Cancel</button>
                <button type="submit" class="endbuy" name="cart_add">Add to cart</button>
            </div>

            <div id="confirmCart">
                <form action="Shoppingcart.php">
                    <button type="button">Back to the shop</button>
                    <button type="submit">Go to cart</button>
                </form>
            </div>
        </form>

    </div>
</main>

<?php
require "Footer.php";
?>
</body>
</html>