<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();


$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = 'Email tidak valid.';


    if (empty($errors)) {
        $stmt = $mysqli->prepare('SELECT id, name, password FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($id, $name, $hash);
        if ($stmt->fetch()) {
            if (password_verify($password, $hash)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;
                header('Location: index.php');
                exit;
            } else {
                $errors[] = 'Email atau password salah.';
            }
        } else {
            $errors[] = 'Email atau password salah.';
        }
    }
}
require 'templates/header.php';
?>
<h2>Login</h2>
<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul><?php foreach ($errors as $e)
            echo '<li>' . htmlspecialchars($e) . '</li>'; ?></ul>
    </div>
<?php endif; ?>
<form method="post" action="login.php" class="card">
    <label>Email <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>"></label>
    <label>Password <input type="password" name="password"></label>
    <button type="submit">Login</button>
</form>
<?php require 'templates/footer.php'; ?>