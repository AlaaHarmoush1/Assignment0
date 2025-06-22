<?php
// After looking at the repeated code, I created a separate file to handle user ID retrieval
session_start();
include '../connection.php';

$name = $_SESSION['name'];

$user_sql = "SELECT * FROM users WHERE name = '$name'";
$user_result = mysqli_query($conc, $user_sql);
$user = $user_result->fetch_assoc();
$user_id = $user['ID'];

