<?php

include 'connection.php';
include './HelperFunctions/getUserId.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = (float)$_POST['amount'];

    $balance_sql = "SELECT balance FROM balance WHERE user_id = '$user_id'";
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
        header("Location: ../HTML/Withdrow.php");
        exit();
    }

    $sql = "UPDATE balance SET balance = balance - $amount WHERE user_id = '$user_id'";
    $result = mysqli_query($conc, $sql);

    if ($result) {
        $transaction_sql = "INSERT INTO transactions (user_id, type, amount) VALUES ('$user_id', 'withdraw', -$amount)";
        mysqli_query($conc, $transaction_sql);
        header("Location: ../HTML/Home.php");
        exit();
    } else {
        $_SESSION['error'] = "Error processing withdrawal: " . mysqli_error($conc);
        header("Location: ../HTML/Withdrow.php");
        exit();
    }
}