<?php $Fname = $_POST['first_name'];
$Lname = $_POST['last_name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$comments = $_POST['comments'];
$formcontent="From: $Fname \n Message: $comments";
$recipient = "burakucarict@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>