<?php

    include '../php/connection.php';
    include './layouts/nav.php';
    include '../php/HelperFunctions/getUserId.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['address']) || !isset($_POST['password'])) {
        die("All fields are required.");
    }else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        $sql = "UPDATE users SET Name='$name', Email='$email', phone_number='$phone', address='$address', Password='$password' WHERE id='$user_id'";
        $result = mysqli_query($conc, $sql);
        if($result) {
            echo "<script>alert('Profile updated successfully!');</script>";
            $_SESSION['isLoggedIn'] = false;
            header("Location: ../HTML/Login.php");
        }
    }

    

    
    
    
}