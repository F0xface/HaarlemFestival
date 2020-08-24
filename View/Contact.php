<!DOCTYPE HTML>
<?php
$thisPage="Contact";
require "Header.php";
?>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/Contact.css">

</head>
<body>
<main>


    <div class="embed-container">

        <h1 class="h1Contact">Contact Us!</h1>

    <form class="formpadding" name="contactform" method="post" action="mail.php"">
        <table width="450px">
            <tr>

                <td valign="top">

                    <label for="first_name">First Name *</label>
                </td>
                <td valign="top">
                    <input  type="text" name="first_name" maxlength="50" size="40">
                </td>
            </tr>
            <tr>
                <td valign="top"">
                <label for="last_name">Last Name *</label>
                </td>
                <td valign="top">
                    <input  type="text" name="last_name" maxlength="50" size="40">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="email">Email Address *</label>
                </td>
                <td valign="top">
                    <input  type="text" name="email" maxlength="80" size="40">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="telephone">Telephone Number</label>
                </td>
                <td valign="top">
                    <input  type="text" name="telephone" maxlength="30" size="40">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="comments">Comments *</label>
                </td>
                <td valign="top">
                    <textarea  name="comments" maxlength="1000" cols="39" rows="6"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

        <h1 class="geninfo">General INFO:</h1>
        <p class="geninfo2">
            Patronaat<br>
            Zijlsingel 2<br>
            2013 DN Haarlem<br>
            E-mail/telefoon<br>

            info@patronaat.nl<br>
            phone:<br>
            023 - 517 58 50 (office) - during office hours 10.00 u - 17.00 u<br>
            023 - 517 58 58 (cash desk /information number) </p>

    </div>

    <script>
        function myFunction() {
            alert("The form was submitted");
        }
    </script>


</main>
</body>
</html>

