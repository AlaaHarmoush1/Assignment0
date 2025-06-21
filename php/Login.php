<?php 
session_start();


include_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' and Password = '$password'";

        $results = mysqli_query($conc, $sql);

        if($results && $results->num_rows === 1){
            $user = mysqli_fetch_assoc($results);
            $_SESSION['isloggedin'] = true;
            $_SESSION['name'] = $user['Name'];

                header("Location: ../HTML/Home.php");
        }else{
                $_SESSION['error'] = "Invalid Email or Password"; // I got this method online not from my own knowledge
                header("Location: ../HTML/Login.php");
            }
    }
}



?>