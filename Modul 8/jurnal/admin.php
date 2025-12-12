<<<<<<< HEAD
<?php
$data = [];
if (file_exists("data.json")) {
    $data = json_decode(file_get_contents("data.json"), true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="table-container">
    <h2>Data Buku Tamu</h2>

    <a href="export.php" class="btn-export actions">Export CSV</a>
    <a href="hapus_semua.php" class="btn-clear actions">Hapus Semua</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Keperluan</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>

        <?php if (count($data) == 0): ?>
            <tr><td colspan="7" style="text-align:center;">Belum ada data</td></tr>
        <?php else: ?>
            <?php foreach ($data as $i => $row): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td><?= $row["nohp"] ?></td>
                <td><?= $row["keperluan"] ?></td>
                <td><?= $row["waktu"] ?></td>
                <td class="actions">
                    <a class="btn-delete" href="hapus.php?id=<?= $i ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

    <br>
    <a href="index.html"><button>Kembali ke Awal</button></a>
</div>

</body>
</html>
=======
<?php
$data = [];
if (file_exists("data.json")) {
    $data = json_decode(file_get_contents("data.json"), true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="table-container">
    <h2>Data Buku Tamu</h2>

    <a href="export.php" class="btn-export actions">Export CSV</a>
    <a href="hapus_semua.php" class="btn-clear actions">Hapus Semua</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Keperluan</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>

        <?php if (count($data) == 0): ?>
            <tr><td colspan="7" style="text-align:center;">Belum ada data</td></tr>
        <?php else: ?>
            <?php foreach ($data as $i => $row): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td><?= $row["nohp"] ?></td>
                <td><?= $row["keperluan"] ?></td>
                <td><?= $row["waktu"] ?></td>
                <td class="actions">
                    <a class="btn-delete" href="hapus.php?id=<?= $i ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

    <br>
    <a href="index.html"><button>Kembali ke Awal</button></a>
</div>

</body>
</html>
>>>>>>> a4447ec6a2d97d2218d98cbecfac217cc39dd6df
