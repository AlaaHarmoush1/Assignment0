<?php

session_start();

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>

    

    <div class="form-section">
        <div class="container">
            <div class="greeting-section">
                <h1>Hello, and Welcome</h1>
                <p>Please fill in the details to register</p>
            </div>
            
            <form class="form" action="../php/Register.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="Name" name="name" id="Name" placeholder="Enter your Name" required>
                </div>
                <div class="form-group">
                    <label for="Phone">Phone Number</label>
                    <input type="text" name="Number" id="Number" placeholder="Enter your Number" required>
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" name="Address" id="Address" placeholder="Enter your Address" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <div class="button-section form-group">
                    <button type="submit" class="register-button">Register</button>
                </div>
                <div class="login-section form-group">
                    <p>Already have an account? <a href="Login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <div class="image-section"></div>
</body>
</html>