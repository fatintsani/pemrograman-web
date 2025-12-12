<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();


$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';


    if ($name === '')
        $errors[] = 'Nama wajib diisi.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = 'Email tidak valid.';
    if (strlen($password) < 6)
        $errors[] = 'Password minimal 6 karakter.';
    if ($password !== $password_confirm)
        $errors[] = 'Konfirmasi password tidak cocok.';


    if (empty($errors)) {
        // cek email unique
        $stmt = $mysqli->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = 'Email sudah terdaftar.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt2 = $mysqli->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
            $stmt2->bind_param('sss', $name, $email, $hash);
            if ($stmt2->execute()) {
                $_SESSION['user_id'] = $stmt2->insert_id;
                $_SESSION['user_name'] = $name;
                header('Location: index.php');
                exit;
            } else {
                $errors[] = 'Gagal menyimpan data.';
            }
        }
    }
}
require 'templates/header.php';
?>
<h2>Register</h2>
<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul><?php foreach ($errors as $e)
            echo '<li>' . htmlspecialchars($e) . '</li>'; ?></ul>
    </div>
<?php endif; ?>
<form method="post" action="register.php" class="card">
    <label>Nama <input type="text" name="name" value="<?= htmlspecialchars($name ?? '') ?>"></label>
    <label>Email <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>"></label>
    <label>Password <input type="password" name="password"></label>
    <label>Konfirmasi Password <input type="password" name="password_confirm"></label>
    <button type="submit">Daftar</button>
</form>
<?php require 'templates/footer.php'; ?>