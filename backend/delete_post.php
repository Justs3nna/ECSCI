<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$conn->query("DELETE FROM posts WHERE id=$id");

header("Location: dashboard.php");
exit();
