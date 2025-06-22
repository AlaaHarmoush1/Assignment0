<?php

session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = (float)$_POST['amount'];
    $name = $_SESSION['name'];

    $user_sql = "SELECT ID FROM users WHERE Name = '$name'";
    $user_result = mysqli_query($conc, $user_sql);
    if (!$user_result || mysqli_num_rows($user_result) === 0) {
        $_SESSION['error'] = "User not found.";
        header("Location: ../HTML/Login.php");
        exit();
    }

    $user = mysqli_fetch_assoc($user_result);
    $userId = $user['ID'];


    $balance_sql = "SELECT balance FROM balance WHERE user_id = '$userId'";
    $balance_result = mysqli_query($conc, $balance_sql);
    if (!$balance_result || mysqli_num_rows($balance_result) === 0) {
        $_SESSION['error'] = "Balance record not found.";
        header("Location: ../HTML/Withdorw.php");
        exit();
    }


    $balance_info = mysqli_fetch_assoc($balance_result);
    $current_balance = (float)$balance_info['balance'];


    if ($amount > $current_balance) {
        $_SESSION['error'] = "Insufficient balance.";
        header("Location: ../HTML/Withdorw.php");
        exit();
    }

    $sql = "UPDATE balance SET balance = balance - $amount WHERE user_id = '$userId'";
    $result = mysqli_query($conc, $sql);

    if ($result) {
        $transaction_sql = "INSERT INTO transactions (user_id, type, amount) VALUES ('$userId', 'withdraw', -$amount)";
        mysqli_query($conc, $transaction_sql);
        header("Location: ../HTML/Home.php");
        exit();
    } else {
        $_SESSION['error'] = "Error processing withdrawal: " . mysqli_error($conc);
        header("Location: ../HTML/Withdrow.php");
        exit();
    }
}