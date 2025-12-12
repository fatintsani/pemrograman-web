<!-- templates/header.php -->
<?php if (session_status() == PHP_SESSION_NONE)
    session_start(); ?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Aplikasi Praktikum</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <h1><a href="index.php">Aplikasi Praktikum</a></h1>
            <nav>
                <?php if (!empty($_SESSION['user_name'])): ?>
                    <span>Halo, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container"></main>