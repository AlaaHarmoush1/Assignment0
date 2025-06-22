<?php 



include '../php/connection.php';
include '../php/HelperFunctions/getUserId.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = (float)$_POST['amount'];
  

    $sql = "UPDATE balance SET balance = balance + '$amount' WHERE user_id = '$user_id'";
    $result = mysqli_query($conc, $sql);

    if ($result) {

        $logSql = "INSERT INTO transactions (user_id, type, amount) VALUES ('$user_id', 'deposit', $amount)";
        mysqli_query($conc, $logSql);
        header("Location: ../HTML/Home.php");
        exit();
        
    } else {
        $_SESSION['error'] = "Error processing deposit: " . mysqli_error($conc);
        header("Location: ../HTML/Deposite.php");
        exit();
    }
}
