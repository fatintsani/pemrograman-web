<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();


$errors = [];
$name = '';
$email = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    if ($name === '')
        $errors[] = 'Nama wajib diisi.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = 'Email tidak valid.';
    if (strlen($password) < 6)
        $errors[] = 'Password minimal 6 karakter.';


    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $name, $email, $hash);
        if ($stmt->execute()) {
            $_SESSION['flash'] = 'User berhasil ditambahkan.';
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Gagal menambah user.';
        }
    }
}
require 'templates/header.php';
?>
<h2>Tambah User</h2>
<?php if ($errors): ?>
    <div class="errors">
        <ul><?php foreach ($errors as $e)
            echo "<li>$e</li>"; ?></ul>
    </div><?php endif; ?>
<form method="post" class="card">
    <label>Nama <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"></label>
    <label>Email <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"></label>
    <label>Password <input type="password" name="password"></label>
    <button type="submit">Simpan</button>
</form>
<?php require 'templates/footer.php'; ?>