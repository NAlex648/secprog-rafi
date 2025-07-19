<?php
include '../inc/db.php';
session_start();

// Retrieve the submitted username and password
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Query user record by username
$stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Compare plain-text password (FOR TESTING ONLY)
if ($user && $password === $user['password']) {
    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $username;

    // Redirect to dashboard
    header("Location: dashboard.php");
    exit;
} else {
    // Invalid credentials message
    echo "Invalid username or password.";
}
?>