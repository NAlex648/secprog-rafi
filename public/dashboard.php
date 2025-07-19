<?php
include '../inc/db.php';
include '../inc/auth.php';
requireLogin();

$baseUrl = '/secprog-rafi/public';

$stmt = $pdo->prepare("SELECT slug, original_url, visit_count FROM urls WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$urls = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { color: #007BFF; text-decoration: none; }
        a:hover { text-decoration: underline; }
        form { margin-top: 30px; }
    </style>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>

    <h2>Your URLs</h2>
    <table>
        <tr>
            <th>Slug</th>
            <th>Original URL</th>
            <th>Visits</th>
        </tr>
        <?php if (count($urls) > 0): ?>
            <?php foreach ($urls as $url): ?>
                <tr>
                    <td><a href="<?= $baseUrl ?>/<?= htmlspecialchars($url['slug']) ?>" target="_blank">
                        <?= $baseUrl ?>/<?= htmlspecialchars($url['slug']) ?>
                    </a></td>
                    <td><?= htmlspecialchars($url['original_url']) ?></td>
                    <td><?= isset($url['visit_count']) ? (int)$url['visit_count'] : 0 ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No URLs shortened yet.</td>
            </tr>
        <?php endif; ?>
    </table>

    <h2>Shorten a New URL</h2>
    <form method="POST" action="shorten.php">
        <label>Original URL: <input type="url" name="original_url" required style="width: 80%;"></label><br><br>
        <label>Custom Slug: <input type="text" name="slug" required></label><br><br>
        <button type="submit">Shorten</button>
    </form>

    <br><br>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>