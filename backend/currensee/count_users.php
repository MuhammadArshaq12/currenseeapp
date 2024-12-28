<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Query to count users
$sql = "SELECT COUNT(*) as totalUsers FROM users";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

// Return as JSON
echo json_encode($data);

$conn->close();
?>
