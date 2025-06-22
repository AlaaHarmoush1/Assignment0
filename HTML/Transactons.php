<?php
ini_set('display_errors', 0);


include '../php/connection.php';
include './layouts/nav.php';
include '../php/HelperFunctions/getUserId.php';
include '../php/HelperFunctions/handleError.php';

$sql = "SELECT * FROM transactions WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conc, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
    <link rel="stylesheet" href="transactions.css">
</head>
<body>
    <h1> View or Download Transaction history</h1>

    <a href="../php/downloadtransactions.php" class="download-button">Download Files</a>

    <table border="1" cellpadding="10" cellspacing="0">
        
        <tr>
            <th>Type</th>
            <th>Amount</th>
            <th>Transaction Date</th>
        </tr>
    
        <?php 
        
        while($data = mysqli_fetch_assoc($result)){
            $type = ucfirst($data['type']);
            $amount = $data['amount'];
            $date = $data['created_at'];
            $style = ($amount < 0) ? 'style="color: red;"' : 'style="color: green;"';

            echo "<tr>
                    <td $style>$type</td>
                    <td $style>$amount</td>
                    <td $style>$date</td>
                </tr>";
        }
        
        
        ?>

    
    </table>
</body>