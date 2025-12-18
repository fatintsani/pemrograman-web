<?php
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>Edit User</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <input type="text" name="name" value="<?= $user['name']; ?>" required>
        <input type="email" name="email" value="<?= $user['email']; ?>" required>
        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</div>

</body>
</html>
