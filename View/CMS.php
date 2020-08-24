<?php
session_start();
require '../Controller/CMSLogic.php';
include_once '../Model/CMSsql.php';

if(checkRank($_SESSION["email"]) == "Not Verified"){
    header("Location: NoAccess.php");
}
else if(checkRank($_SESSION["email"]) == "Admin"){
    echo "yes";
}