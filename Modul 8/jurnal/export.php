<<<<<<< HEAD
<?php
$data = json_decode(file_get_contents("data.json"), true);

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=buku_tamu.csv");

$fp = fopen("php://output", "w");

fputcsv($fp, ["Nama", "Alamat", "No HP", "Keperluan", "Waktu"]);

foreach ($data as $row) {
    fputcsv($fp, $row);
}

fclose($fp);
exit;
?>
=======
<?php
$data = json_decode(file_get_contents("data.json"), true);

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=buku_tamu.csv");

$fp = fopen("php://output", "w");

fputcsv($fp, ["Nama", "Alamat", "No HP", "Keperluan", "Waktu"]);

foreach ($data as $row) {
    fputcsv($fp, $row);
}

fclose($fp);
exit;
?>
>>>>>>> a4447ec6a2d97d2218d98cbecfac217cc39dd6df
