<?php

session_start();


if ($_SESSION['haveAccount'] == false) {
    header("Location: ./Home.php");
    $_SESSION['error'] = "Create a balance account first.";
    
}

if(isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}



include '../php/connection.php';
include './layouts/nav.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
    <link rel="stylesheet" href="../CSS/deposit.css">
</head>
<body>
    <h1 class='Greetings'>Deposit Money</h1>
    <p class='Greetings'>You can deposit money into your balance account here.</p>

    <div class="deposit-form">
        <form action="../php/Deposit.php" method="POST">
            <label for="amount">Enter Amount to Deposit:</label>
            <input type="number" id="amount" name="amount" required>
            <button type="submit" id="Deposite-button" >Deposit</button>
        </form>
    </div>


    <script src="../JS/transactions.js"></script>
</body>
</html>


