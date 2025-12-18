<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['name']  = $user['name'];
    header("Location: index.php");
} else {
    header("Location: login.php?error=1");
}
?>
