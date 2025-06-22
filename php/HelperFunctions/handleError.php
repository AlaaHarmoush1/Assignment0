<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);

if (!$_SESSION['isloggedin']) {
    header("Location: ./Login.php");
    exit();
}

// if ($current_page !== 'Home.php' || $current_page !== 'Login.php' || $current_page !== 'Register.php') {
//     if ($_SESSION['haveAccount'] == false) {
//         header("Location: ./Home.php");
//         $_SESSION['error'] = "Create a balance account first.";
//         exit();
//     }
// }


if(isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}


