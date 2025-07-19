<?php
$pdo = new PDO("mysql:host=localhost;dbname=url_shortener;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>