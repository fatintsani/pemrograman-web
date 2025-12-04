<?php

$nama = "Fatin Muflihuts Tsani";
$umur = 19;

function sapa($nama) {
echo "Halo, $nama!";
}
sapa("Fatin"); 
// Output: Halo, Fatin!

if(isset($_POST['submit'])){
$nama = $_POST['nama'];
echo "Nama Anda: $nama";
}

$conn = mysqli_connect("localhost", "username", "password", "nama_database");
if (!$conn) {
die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result)){
echo "Nama: " . $row["nama"] . "<br>";
echo "Email: " . $row["email"] . "<br>";
}
} else {
echo "Data tidak ditemukan";
}

mysqli_close($conn);