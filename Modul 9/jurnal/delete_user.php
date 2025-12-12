<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // prepared statement untuk aman
    $stmt = $mysqli->prepare('DELETE FROM users WHERE id = ? LIMIT 1');
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        $_SESSION['flash'] = 'User dihapus.';
    } else {
        $_SESSION['flash'] = 'Gagal menghapus user.';
    }
}
header('Location: index.php');
exit;