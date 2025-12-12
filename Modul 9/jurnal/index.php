<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE)
    session_start();

require 'templates/header.php';

// simple search
$q = trim($_GET['q'] ?? '');
$page = max(1, intval($_GET['page'] ?? 1));
$limit = 8;
$offset = ($page - 1) * $limit;

$like = "%{$q}%";

// cek apakah kolom created_at ada (agar tidak error)
$colCheck = $mysqli->query("SHOW COLUMNS FROM users LIKE 'created_at'");
$hasCreatedAt = ($colCheck && $colCheck->num_rows > 0);

// tentukan SELECT kolom
$selectCols = $hasCreatedAt
    ? "id, name, email, created_at"
    : "id, name, email";

// =============== QUERY DATA ===============
if ($q !== '') {
    $stmt = $mysqli->prepare("
        SELECT $selectCols 
        FROM users 
        WHERE name LIKE ? OR email LIKE ?
        ORDER BY id DESC 
        LIMIT ? OFFSET ?
    ");
    $stmt->bind_param("ssii", $like, $like, $limit, $offset);
} else {
    $stmt = $mysqli->prepare("
        SELECT $selectCols 
        FROM users
        ORDER BY id DESC 
        LIMIT ? OFFSET ?
    ");
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$res = $stmt->get_result();

// =============== QUERY TOTAL DATA (tanpa LIMIT) ===============
if ($q !== '') {
    $stmtCount = $mysqli->prepare("SELECT COUNT(*) AS total FROM users WHERE name LIKE ? OR email LIKE ?");
    $stmtCount->bind_param("ss", $like, $like);
} else {
    $stmtCount = $mysqli->prepare("SELECT COUNT(*) AS total FROM users");
}

$stmtCount->execute();
$totalRes = $stmtCount->get_result()->fetch_assoc()['total'];

?>

<div class="toolbar">
    <form method="get" class="search">
        <input type="text" name="q" placeholder="Cari nama atau email" value="<?= htmlspecialchars($q) ?>">
        <button type="submit">Cari</button>
    </form>
    <a class="btn" href="register.php">Tambah User</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <?php if ($hasCreatedAt): ?>
                <th>Terdaftar</th>
            <?php endif; ?>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>

                <?php if ($hasCreatedAt): ?>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                <?php endif; ?>

                <td>
                    <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus user?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="pagination">
    <?php
    $totalPages = ceil($totalRes / $limit);
    for ($p = 1; $p <= $totalPages; $p++) {
        $active = $p == $page ? 'active' : '';
        echo "<a class='$active' href='?q=" . urlencode($q) . "&page=$p'>$p</a> ";
    }
    ?>
</div>

<?php require 'templates/footer.php'; ?>