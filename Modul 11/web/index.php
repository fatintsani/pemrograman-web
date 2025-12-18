<?php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

$data = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Manajemen User</h2>
        <div class="user-info">
            <span>Halo, <strong><?= $_SESSION['name']; ?></strong></span>
            <a href="logout.php" class="logout">Logout</a>
        </div>

        <a href="create.php" class="btn">+ Tambah User</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>