<?php
// Auth/login.php

header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['message' => 'Database connection failed']);
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

// Query to fetch user data
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['message' => 'No account found with that email address']);
    exit();
}

$user = $result->fetch_assoc();
$hashed_password = $user['password'];

// Verify password
if (password_verify($password, $hashed_password)) {
    // Handle successful login (e.g., create session, set cookies)
    echo json_encode(['success' => true, 'message' => 'Login successful']);
} else {
    echo json_encode(['message' => 'Invalid password']);
}

$stmt->close();
$conn->close();
?>
