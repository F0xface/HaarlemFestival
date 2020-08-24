<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="../CSS/HeaderFooter.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
    <?php
        session_start();
    ?>
        <nav>
            <a href="http://hfteam4.infhaarlem.nl/"> <img id="Logo" src="../img/haarlem-logo.png" alt="Haarlem Festival"></a>
            <ul class="hfList">
            	<li><a class = "header_button" href="http://hfteam4.infhaarlem.nl/" <?php if ($thisPage=="Home"){
				echo " id=\"currentpage\"";} ?> >HOME</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a class = "header_button" href="/View/Dance.php" <?php if ($thisPage=="Dance"){
				echo " id=\"currentpage\"";} ?> >DANCE</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a class = "header_button" href="/View/Food.php" <?php if ($thisPage=="Food"){
				echo " id=\"currentpage\"";} ?> >FOOD</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a id="navJazzPage" class = "header_button" href="/View/Jazz.php" <?php if ($thisPage=="Jazz"){
				echo " id=\"currentpage\"";} ?> >JAZZ</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a class = "header_button" href="/View/History.php" <?php if ($thisPage=="History"){
				echo " id=\"currentpage\"";} ?> >HISTORIC</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a class = "header_button" href="/View/Program.php" <?php if ($thisPage=="Program"){
				echo " id=\"currentpage\"";} ?> >PROGRAM</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a class = "header_button" href="/View/Contact.php" <?php if ($thisPage=="Contact"){
                echo " id=\"currentpage\"";};?> >CONTACT</a></li>
                <li><img class ="period" src="../img/Header/Point.png"</li>
                <li><a class = "header_button" href="/View/CMSlogin.php" <?php if ($thisPage=="Volunteers"){
                echo " id=\"currentpage\"";} ?> >VOLUNTEERS</a></li>
            </ul>
            <a href ="/View/Shoppingcart.php"><img class="shopping_cart" src="../img/shopping%20cart.png" alt="shopping cart"></a>
        </nav>
        <div id = "spacing"></div>
    </body>