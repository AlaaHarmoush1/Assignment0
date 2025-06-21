<?php
session_start();
include_once '../php/connection.php';

if (!$_SESSION['isloggedin']) {
    header("Location: ./Login.php");
    exit();
}

if (isset($_SESSION['error'])) {
  echo "<script>alert('" . $_SESSION['error'] . "');</script>";
  unset($_SESSION['error']);
}

$name = $_SESSION['name'];

$user_sql = "SELECT * FROM users WHERE Name = '$name'";
$user_result = mysqli_query($conc, $user_sql);
$user = $user_result->fetch_assoc();
$user_id = $user['ID'];
$_SESSION['user_id'] = $user_id;

$balance_sql = "SELECT * FROM balance WHERE user_id = '$user_id'";
$balance_result = mysqli_query($conc, $balance_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home</title>
  <link rel="stylesheet" href="../CSS/home.css">
</head>
<body>

<?php include './layouts/nav.php';?>

<h1 class='Greetings'>Welcome, <?php echo $name; ?></h1>
<p class='Greetings'>Welcome to the home page. You are logged in.</p>

<?php
if (mysqli_num_rows($balance_result) === 0) {
    echo '
    <div class="balance-section">
        <p>You don\'t have a balance account yet.</p>
        <a href="../php/CreateBalanceAccount.php">
            <button class="create-balance-button">Create Balance Account</button>
        </a>
    </div>';
} else {
    $balance_info = $balance_result->fetch_assoc();
    $balance = $balance_info['balance'];
    echo "
    <div class='balance-section'>
        <p>Your current balance is: <span class='balance-amount'>$$balance</span></p>
    </div>";
}
?>

</body>
</html>
