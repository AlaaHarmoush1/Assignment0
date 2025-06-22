<?php

include 'connection.php';
include './HelperFunctions/getUserId.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="transactions.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, ['Type', 'Amount', 'Date']);

$sql = "SELECT * FROM transactions WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conc, $sql);

if(mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        $type = ucfirst($data['type']);
        $amount = $data['amount'];
        $date = $data['created_at'];
        
        fputcsv($output, [$type, $amount, $date]);
    }
} else {
    fputcsv($output, ['No transactions found']);
}

fclose($output);
mysqli_close($conc);
exit();