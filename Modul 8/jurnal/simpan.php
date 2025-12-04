<?php
$dataFile = "data.json";

$entry = [
    "nama"      => $_POST["nama"],
    "alamat"    => $_POST["alamat"],
    "nohp"      => $_POST["nohp"],
    "keperluan" => $_POST["keperluan"],
    "waktu"     => date("Y-m-d H:i:s")
];

$data = [];

if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
}

$data[] = $entry;

file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tersimpan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="success-box">
    <h2>Data Berhasil Disimpan!</h2>

    <a href="index.html">Kembali</a>
    <a href="admin.php">Menu Admin</a>
</div>

</body>
</html>
