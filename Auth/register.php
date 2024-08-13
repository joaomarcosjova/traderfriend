<?php
// register.php

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

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$terms = isset($_POST['terms']);

if ($password !== $confirm_password) {
    echo json_encode(['message' => 'Passwords do not match']);
    exit();
}

if (!$terms) {
    echo json_encode(['message' => 'You must agree to the terms and conditions']);
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insert into the database
$stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $full_name, $email, $hashed_password);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Account created successfully']);
} else {
    echo json_encode(['message' => 'Error creating account']);
}

$stmt->close();
$conn->close();
?>