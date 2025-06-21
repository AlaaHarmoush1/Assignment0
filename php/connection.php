<?php

$ServerName = "localhost";
$username = "root";
$password = "";
$database = "assigment0";

$conc = new mysqli($ServerName, $username, $password, $database);

if ($conc->connect_error) {
    die("Connection failed: " . $conc->connect_error);
    header("Location: ../php/DatabaseError.html");
}