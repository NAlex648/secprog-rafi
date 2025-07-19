<?php
include '../inc/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

header("Location: index.php");
exit;
?>