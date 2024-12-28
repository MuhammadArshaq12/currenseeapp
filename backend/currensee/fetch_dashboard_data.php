<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Query to get total users and total conversions
$sqlUsers = "SELECT COUNT(*) as totalUsers FROM users";
$sqlConversions = "SELECT COUNT(*) as totalConversions FROM conversions";

// Execute the queries
$resultUsers = $con->query($sqlUsers);
$resultConversions = $con->query($sqlConversions);

if ($resultUsers->num_rows > 0 && $resultConversions->num_rows > 0) {
    $users = $resultUsers->fetch_assoc();
    $conversions = $resultConversions->fetch_assoc();

    // Return data in JSON format
    echo json_encode(array(
        "totalUsers" => $users['totalUsers'],
        "totalConversions" => $conversions['totalConversions']
    ));
} else {
    echo json_encode(array("error" => "No data found"));
}

$con->close();
?>


