<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();


if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = intval($_GET['id']);


$stmt = $mysqli->prepare('SELECT name, email FROM users WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($name, $email);
if (!$stmt->fetch()) {
    echo "User tidak ditemukan";
    exit;
}
$stmt->close();


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = trim($_POST['name']);
    $newEmail = trim($_POST['email']);
    $newPassword = $_POST['password'];


    if ($newName === '')
        $errors[] = 'Nama wajib diisi.';
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL))
        $errors[] = 'Email tidak valid.';


    if (empty($errors)) {
        if ($newPassword === '') {
            $stmt = $mysqli->prepare('UPDATE users SET name = ?, email = ? WHERE id = ? LIMIT 1');
            $stmt->bind_param('ssi', $newName, $newEmail, $id);
        } else {
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $mysqli->prepare('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ? LIMIT 1');
            $stmt->bind_param('sssi', $newName, $newEmail, $hash, $id);
        }


        if ($stmt->execute()) {
            $_SESSION['flash'] = 'User berhasil diperbarui.';
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Gagal memperbarui user.';
        }
    }
}
require 'templates/header.php';
?>
<h2>Edit User</h2>
<?php if ($errors): ?>
    <div class="errors">
        <ul><?php foreach ($errors as $e)
            echo "<li>$e</li>"; ?></ul>
    </div><?php endif; ?>
<form method="post" class="card">
    <label>Nama <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"></label>
    <label>Email <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"></label>
    <label>Password Baru (kosongkan jika tidak ingin ubah)
        <input type="password" name="password">
    </label>
    <button type="submit">Update</button>
</form>
<?php require 'templates/footer.php'; ?>