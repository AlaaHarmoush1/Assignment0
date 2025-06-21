<?php 

session_start();

include_once '../php/connection.php';

$name = $_SESSION['name'];

$user_sql = "SELECT * FROM users WHERE name = '$name'";
$user_result = mysqli_query($conc, $user_sql);
$user = $user_result->fetch_assoc();
$user_id = $user['ID'];

$sql =  "INSERT INTO balance (user_id, balance) VALUES ('$user_id', 0)";
if (mysqli_query($conc, $sql)) {
    $_SESSION['haveAccount'] = true;
    header("Location: ../HTML/Home.php");
}