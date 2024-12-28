<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include("db.php");

// SQL query to get users
$sql = "SELECT * FROM conversions";
$result = $con->query($sql);

$conversion = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $conversion[] = [
            'id' => $row['id'],
            'user_id' => $row['user_id'],
            'from_currency' => $row['from_currency'],
            'to_currency' => $row['to_currency'],
            'amount' => $row['amount'],
            'total' => $row['total'],
            'conversion_date' => $row['conversion_date']
        ];
    }
    echo json_encode(['success' => true, 'conversions' => $conversion]);
} else {
    echo json_encode(['success' => false, 'message' => 'No conversions found']);
}

$con->close();
?>
