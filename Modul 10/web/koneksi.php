<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "web_crud";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
