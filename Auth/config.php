<?php
$servername = "localhost";
$username = "root"; // or your MySQL username
$password = "Kdteam@2024"; // or your MySQL password
$dbname = "users_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

