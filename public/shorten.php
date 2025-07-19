<?php
include '../inc/auth.php';
include '../inc/db.php';
requireLogin();

$slug = $_POST['slug'];
$original_url = $_POST['original_url'];
$user_id = $_SESSION['user_id'];

// Optional: validate slug uniqueness
$stmt = $pdo->prepare("SELECT COUNT(*) FROM urls WHERE slug = ?");
$stmt->execute([$slug]);
if ($stmt->fetchColumn() > 0) {
    echo "Slug already exists. Try another one.";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO urls (user_id, slug, original_url) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $slug, $original_url]);

header("Location: dashboard.php");
exit;
?>