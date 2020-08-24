<?php
include_once "../Model/Shoppingcartsql.php";
session_start();
$totalPrice = $_SESSION['TotalPrice'];
$email = $_SESSION['email'];
$_SESSION['betaald'] = 1;

/*
 * Make sure to disable the display of errors in production code!
 */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("mollie/vendor/autoload.php");
require_once ("mollie/examples/functions.php");
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/developers/api-keys
 */
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

// print_r($mollie);

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => $totalPrice
    ],
    "description" => "Haarlem Festival",
    "redirectUrl" => "http://hfteam4.infhaarlem.nl//Controller/Mail/SendMail.php",
    "webhookUrl"  => "http://hfteam4.infhaarlem.nl/Controller/webhook.php"
]);

header("Location: " . $payment->getCheckoutUrl(), true, 303);
?>