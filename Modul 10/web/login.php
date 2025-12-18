<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>Login</h2>

    <?php if(isset($_GET['error'])) : ?>
        <p class="error">Email atau password salah!</p>
    <?php endif; ?>

    <form action="login_proses.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
