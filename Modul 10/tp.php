<?php

$nama = $_POST['nama'];
mysqli_query($koneksi, "INSERT INTO user (nama) VALUES ('$nama')");

$koneksi = mysqli_connect("localhost", "root", "", "db_app");

$db = new PDO("mysql:host=localhost;dbname=db_app", "root", "");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$stmt = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->execute([$username, $password]);

$stmt = $koneksi->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$query = "SELECT id_customer, SUM(total) AS total_penjualan 
          FROM orders 
          GROUP BY id_customer";
$result = mysqli_query($koneksi, $query);

while ($data = mysqli_fetch_assoc($result)) {
  echo "Customer ID: " . $data['id_customer'] . "<br>";
  echo "Total Penjualan: Rp " . $data['total_penjualan'] . "<hr>";
}
