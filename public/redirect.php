<?php
include '../inc/db.php';

$slug = $_GET['slug'] ?? '';
$stmt = $pdo->prepare("SELECT original_url FROM urls WHERE slug = ?");
$stmt->execute([$slug]);
$url = $stmt->fetch();

if ($url) {
    // Optional: update visit count
    $pdo->prepare("UPDATE urls SET visit_count = visit_count + 1 WHERE slug = ?")->execute([$slug]);

    header("Location: " . $url['original_url']);
    exit;
} else {
    echo "Short link not found.";
}