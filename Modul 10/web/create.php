<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>Tambah User</h2>
    <form action="store.php" method="POST">
        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</div>

</body>
</html>
