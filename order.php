<?php
session_start();
require 'db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["product_id"])) {
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id) VALUES (?, ?)");
    $stmt->execute([$_SESSION["user_id"], $_GET["product_id"]]);

    header("Location: profile.php");
    exit();
}
?>
