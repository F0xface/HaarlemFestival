<!DOCTYPE HTML>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="../CSS/Jazz.css">
    <script defer src="../Controller/Jazzscript.js"></script>
    <link rel="javascript" href="../Controller/Javascript.js">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
require_once '../Controller/JazzLogic.php';
require_once '../Controller/CMSLogic.php';

require "HeaderCMS.php";

session_start();

if($_GET['type'] == "band"){

?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    Band : <input type="text" name="UpdatedName" value=<?php echo $_GET['value'] ?>><br>
    <input type="hidden" name="band_ID" value=<?php echo $_GET['band_ID'] ?>>

    <input type="submit" value="Update" name="submit">
    <?php

    if (isset($_POST['submit'])) {
        $band_ID = $_POST["band_ID"];

        UpdateBand($_POST['UpdatedName'], $band_ID);
        header("Location: CMS.php");
    }
    ?>
</form>
<?php
}else if($_GET['type'] == "program"){ ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<table>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <?php
    $result = getEvent($_GET['scheduleID']);

    while ($row = $result->fetch_assoc()) {
        echo "
              <input type='hidden' name='programID' value='$row[scheduleID]'>
              <tr><td><input type='date' name='dateEvent' value='$row[dateJazzEvent]'></td></tr>
              <tr><td><input type='time' name='timestart' value='$row[timestart]'</td></tr>
              <tr><td><input type='time' name='timefinish' value='$row[timefinish]'</td></tr>
              <tr><td><input type='text' name='hall' value='$row[hall]'</td></tr>
              <tr><td><input type='text' name='location' value='$row[location]'</td></tr>
              <tr><td><input type='text' name='bandID' value='$row[jazzbandID]'</td></tr>";
    }
    ?>
    <input type="submit" value="Update" name="submitProgram">
    </form>
</table>



    <?php

    if (isset($_POST['submit'])) {
        $band_ID = $_POST["band_ID"];

        UpdateBand($_POST['UpdatedName'], $band_ID);
        header("Location: CMS.php");
    }

    if (isset($_POST['submitProgram'])) {
        $scheduleID = $_POST["programID"];

        UpdateProgram($_POST['dateEvent'],$_POST['timestart'], $_POST['timefinish'],$_POST['hall'], $_POST['location'],$_POST['bandID'], $scheduleID);
    }
    ?>
</form>
<?php }else if($_GET['type'] == "deleteBand") {
    deleteBand($_GET["band_ID"]);
    header("Location: CMS.php");
}else if($_GET['type'] == "changeRank") {
    changeRank($_GET["userID"], $_GET["rank"]);
    header("Location: CMS.php");
}
?>

</body>
