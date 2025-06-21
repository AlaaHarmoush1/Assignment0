<?php

session_start();

include_once 'connection.php';



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['Number']) && isset($_POST['Address'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['Number'];
        $address = $_POST['Address'];
        $password = $_POST['password'];
        

        $sql = "INSERT INTO users (name, email, password, phone_number, address) VALUES ('$name', '$email', '$password', '$phone_number', '$address')";
        $results = mysqli_query($conc, $sql);

        if($results){
            $_SESSION['isloggedin'] = true;
            $_SESSION['name'] = $name;

            header("Location: ../HTML/Home.php");
        }else{
            header("Location: ../HTML/Register.php");
            $_SESSION['error'] = "Email already exists";
        }


        
    }else{
        header("Location: ../HTML/Register.php");
        $_SESSION['error'] = "Please fill all the fields";
    }
}