<?php 

session_start();

include '../php/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = (float)$_POST['amount'];
    $userId = (int)$_SESSION['user_id'];

    $sql = "UPDATE balance SET balance = balance + '$amount' WHERE user_id = '$userId'";
    $result = mysqli_query($conc, $sql);

    if ($result) {

        $name = $_SESSION['name'];
        $getUserSql = "SELECT ID FROM users WHERE Name = '$name'";
        $getUserResult = mysqli_query($conc, $getUserSql);

        if ($getUserResult && mysqli_num_rows($getUserResult) > 0) {
            $userRow = mysqli_fetch_assoc($getUserResult);
            $realUserId = $userRow['ID'];

            $logSql = "INSERT INTO transactions (user_id, type, amount) VALUES ('$realUserId', 'deposit', $amount)";
            mysqli_query($conc, $logSql);
        }

        header("Location: ../HTML/Home.php");
        exit();
    } else {
        $_SESSION['error'] = "Error processing deposit: " . mysqli_error($conc);
        header("Location: ../HTML/Deposite.php");
        exit();
    }
}
