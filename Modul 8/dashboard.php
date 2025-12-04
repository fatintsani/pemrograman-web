<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit;
}

// Inisialisasi cache buku
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

// Simpan buku baru
if (isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $_SESSION['books'][] = [
        'title' => $title,
        'author' => $author,
        'year' => $year
    ];

    $success = "Buku berhasil ditambahkan!";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef;
            padding: 20px;
        }

        input {
            padding: 5px;
            margin: 5px 0;
        }

        button {
            padding: 5px 10px;
            margin-top: 5px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            padding: 5px 0;
        }

        .success {
            color: green;
        }

        a {
            text-decoration: none;
            color: red;
            float: right;
        }
    </style>
</head>

<body>
    <h2>Selamat datang, <?= $_SESSION['user'] ?></h2>
    <a href="logout.php">Logout</a>
    <hr>

    <h3>Input Data Buku</h3>
    <?php if (isset($success))
        echo "<p class='success'>$success</p>"; ?>
    <form method="post">
        <input type="text" name="title" placeholder="Judul Buku" required><br>
        <input type="text" name="author" placeholder="Penulis" required><br>
        <input type="number" name="year" placeholder="Tahun Terbit" required><br>
        <button type="submit" name="add_book">Tambahkan Buku</button>
    </form>

    <h3>Daftar Buku</h3>
    <ul>
        <?php foreach ($_SESSION['books'] as $book): ?>
            <li><?= "{$book['title']} oleh {$book['author']} ({$book['year']})" ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>