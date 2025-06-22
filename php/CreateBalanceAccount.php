<?php 



include_once '../php/connection.php';
include_once '../php/HelperFunctions/getUserId.php';

$sql =  "INSERT INTO balance (user_id, balance) VALUES ('$user_id', 0)";
if (mysqli_query($conc, $sql)) {
    $_SESSION['haveAccount'] = true;
    header("Location: ../HTML/Home.php");
}