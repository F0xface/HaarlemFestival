<?php $thisPage = "Index"; ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/Index.css">
    <script defer src="../Controller/Indexscript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" href="../CSS/HeaderFooter.css">-->
    <title>Homepage</title>
</head>
<body>
<?php
require '../Controller/IndexLogic.php';
require "Header.php";
?>

<p class="weeks" id="weeks"></p>
<p class="days" id="days"></p>
<p class="hours" id="hours"></p>
<p class="Haarlem_Festival_Text" id="Haarlem_Festival_Text"><br>Haarlem Festival</p>

<?php
echo '<div class=div1 id="div1">';
echo "<div>";
echo "<h1>INFO:</h1>";
@$info = getInfo();
while ($row = $info->fetch_assoc()) {
    @$content = $row['content'];
    echo '<p>' . @$content . '</p>';
}
echo '</div>';
echo '</div>';
?>

<div class=embed-container id="embed-container">
    <?php
    echo "<h1>Get in the mood with this playlist</h1>";
    @$Content = GetInMood();
    while ($row = $Content->fetch_assoc()) {
        @$content = $row['content'];
        echo '<p>' . @$content . '</p>';
    }
    ?>
    <button class="btnJazz" onclick="window.location.href = 'Jazz.php';">Jazz</button>
    <button class="btnDance" onclick="window.location.href = 'Dance.php';">Dance</button>
    <iframe src="https://open.spotify.com/embed/artist/1j0vpirnPJTpjYHRAInw3n" width="300" height="450" frameborder="0"
            allowtransparency="true" allow="encrypted-media"></iframe>
</div>

<div class="embed-container1">
    <?php
    echo "<h1>HISTORY</h1>";
    @$info = GetHistory();
    while ($row = $info->fetch_assoc()) {
        @$content = $row['content'];
        echo '<p>' . @$content . '</p>';
    }
    @$Getimg = GetPicture1();
    while ($row = $Getimg->fetch_assoc()) {
        @$img = $row['content'];
        echo '<img class="block"  src="' . @$img . '" alt="">';
    }
    ?>
    <button class="btnHistory" onclick="window.location.href = 'History.php';">More Info</button>
</div>

<div class="embed-container2">
    <?php
    echo "<h1>Food</h1>";
    @$info = GetFood();
    while ($row = $info->fetch_assoc()) {
        @$content = $row['content'];
        echo '<p>' . @$content . '</p>';
    }
    @$info = GetPicture2();
    while ($row = $info->fetch_assoc()) {
        @$img = $row['content'];
        echo '<img class="block"  src="' . @$img . '" alt="">';
    }
    ?>
    <button class="btnFood" onclick="window.location.href = 'Food.php';">More Info</button>
</div>

<div class="embed-container3">
    <h1>Special Thanks To:</h1>
    <?php
    @$getSponsor = GetSponsors();
    while ($row = $getSponsor->fetch_assoc()) {
        @$sponsors = $row['content'];
        echo '<img class="Sponsor1"  src="' . @$sponsors . '" alt="">';
    }
    ?>
</div>


<div class="page_pics1">
    <?php
    @$info = GetDancePict();
    while ($row = $info->fetch_assoc()) {
        @$content = $row['content'];
        @$link = $row['link'];
        echo '<a href="' . $link . '" target="">';
        echo '<p class="PageName">DANCE</p>';
        echo '<img class="page_pics"  src="' . @$content . '" alt="">';
    }
    ?>
</div>

<div class="page_pics2">
    <?php
    @$info = GetFoodPict();
    while ($row = $info->fetch_assoc()) {
        @$content = $row['content'];
        @$link = $row['link'];
        echo '<a href="' . $link . '" target="">';
        echo '<p class="PageName">FOOD</p>';
        echo '<img class="page_pics"  src="' . @$content . '" alt="">';
    }
    ?>
</div>

<div class="page_pics3">
    <?php
    @$info = GetJazzPict();
    while ($row = $info->fetch_assoc()) {
        @$content = $row['content'];
        @$link = $row['link'];
        echo '<a href="' . $link . '" target="">';
        echo '<p class="PageName">JAZZ</p>';
        echo '<img class="page_pics"  src="' . @$content . '" alt="">';
    }
    ?>
</div>

<div class="page_pics4">

    <?php
    @$info = GetHistoryPict();
    while ($row = $info->fetch_assoc()) {
        @$content = $row['content'];
        @$link = $row['link'];
        echo '<a href="' . $link . '" target="">';
        echo '<p class="PageName">HISTORIC</p>';
        echo '<img class="page_pics"  src="' . @$content . '" alt="">';
    }
    ?>
</div>

</body>
</html>












