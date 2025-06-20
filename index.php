<?php 
SESSION_START();

$_SESSION['isloggedin'] = false;



if (!$_SESSION['isloggedin']) {
    header("Location: ./HTML/Login.html");
    
}else {
    header("Location: ./HTML/Home.php");
}
include_once '../php/connection.php';

?>