<?php

session_start();

$_SESSION['isloggedin'] = false;

if (isset($_SESSION['error'])) {
  echo "<script>alert('" . $_SESSION['error'] . "');</script>";
  unset($_SESSION['error']);
}

if ($_SESSION['isloggedin']) {
    header("Location: ./Home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/Login.css" />
  </head>
  <body>
    <div class="image-section"></div>

    <div class="form-section">
      <div class="container">
        <div class="greeting-section">
          <h1>Welcome Back</h1>
          <p>Please login to proceed</p>
        </div>
        <form class="form" action="../php/Login.php" method="POST">
          <div class="email-section">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required />
          </div>
          <div class="password-section">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required />
          </div>
          <div class="button-section">
            <button type="submit" class="loginButton">Login</button>
          </div>
          <div class="register-section">
            <p>Don't have an account? <a href="Register.php">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
