<?php


session_start();

$_SESSION['isloggedin'] = false;

if (!$_SESSION['isloggedin']) {
    header("Location: ./HTML/Login.php");
    exit();
}