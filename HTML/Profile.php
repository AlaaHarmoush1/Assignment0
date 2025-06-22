<?php
ini_set('display_errors', 0);
include '../php/connection.php';
include '../php/HelperFunctions/getUserId.php';

echo $user_id;

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conc, $sql);
$user = $result->fetch_assoc();

$user_name = $user['Name'];
$user_email = $user['Email'];
$user_phone = $user['phone_number'];
$user_address = $user['address'];
$user_password = $user['Password'];
?>

<style>
    .profile-form {
        background: #ffffff;
        padding: 30px;
        max-width: 500px;
        margin: 40px auto;
        border-radius: 16px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
    }

    .profile-form input {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 16px;
        transition: border 0.2s ease;
    }

    .profile-form input:focus {
        border-color: #457b9d;
        outline: none;
        box-shadow: 0 0 0 3px rgba(69, 123, 157, 0.15);
    }

    .profile-form button {
        width: 100%;
        padding: 12px;
        background: #1d3557;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .profile-form button:hover {
        background: #457b9d;
    }
</style>

<?php include './layouts/nav.php'; ?>

<form action="../php/Profile.php" method="post" class="profile-form">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $user_name; ?>" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user_email; ?>" required>
    
    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $user_phone; ?>" required>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?php echo $user_address; ?>" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $user_password; ?>" required>
    
    <button type="submit">Update Profile</button>
</form>