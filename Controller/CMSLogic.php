<?php
include_once '../Model/CMSsql.php';

$d = new cmsDAO();

if(isset($_POST['login'])) {
    $_SESSION['user'] = array(
        'emailLogin' => $_POST['emailLogin'],
        'pwdLogin' => $_POST['pwdLogin'],
    );
    // Check username and password
    if($d->UserLogin($_POST['emailLogin'], $_POST['pwdLogin'])){
        header('Location: ../View/Dashboard.php');
    }
    else{
        echo "<script>alert('Incorrect username or password')</script>";
    }
};

if(isset($_POST['register'])){
    // Check user input for typing error in password
    if($_POST['password'] === $_POST['password_repeat']) {
        // Check if e-mail is already in use
        if($d->GetUser($_POST['email']) === null) {

            $test = $d->Register($_POST['name'], $_POST['email'], $_POST['password']);
            header('Location: ../View/Registered.php');
        }
        else{
            echo "<script>alert('E-mail already in use')</script>";
        }
    }
    else{
        echo "<script>alert('Passwords don\'t match')</script>";
    }
}
