<<<<<<< HEAD
<?php
session_start();

// Dummy user
$validUser = "admin";
$validPass = "1234";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUser && $password === $validPass) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Jika login gagal, kembali ke index.html dengan error
        echo "<script>alert('Username atau password salah!'); window.location='index.html';</script>";
    }
} else {
    header("Location: index.html");
    exit;
}
=======
<?php
session_start();

// Dummy user
$validUser = "admin";
$validPass = "1234";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUser && $password === $validPass) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Jika login gagal, kembali ke index.html dengan error
        echo "<script>alert('Username atau password salah!'); window.location='index.html';</script>";
    }
} else {
    header("Location: index.html");
    exit;
}
>>>>>>> a4447ec6a2d97d2218d98cbecfac217cc39dd6df
