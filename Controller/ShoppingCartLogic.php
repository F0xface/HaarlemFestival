<?php
    if (isset($_POST['order_tickets'])){
        $email = $_POST['email'];
        $email_rpt = $_POST['emailrpt'];
        if (empty($email) || empty($email_rpt)){
            header("Location: ../View/Shoppingcart.php?error=emptyfields");
            exit();
        }
        elseif ($email == $email_rpt){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (isset($_SESSION['cart'])){
                    header("Location: ../View/Shoppingcart.php?error=cartisempty");
                    exit();
                }
                else {
                    session_start();
                    $_SESSION['email'] = $email;
                    header('Location: betalen.php');
                    exit();
                }
            } else {
                header("Location: ../View/Shoppingcart.php?error=notvalid");
                exit();
            }
        }
        else{
            header("Location: ../View/Shoppingcart.php?error=notthesame");
            exit();
        }
    }

    if (!function_exists('GetTotal')) {
        function GetTotal()
        {
            $_SESSION['TotalPrice'] = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $cart){
                    $_SESSION['TotalPrice'] = $_SESSION['TotalPrice'] + $cart['price'];
                    $_SESSION['TotalPrice'] = number_format((float)$_SESSION['TotalPrice'], 2, '.', '');
                }
            }
        }
    }
