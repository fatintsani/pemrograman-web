<?php
file_put_contents("data.json", json_encode([], JSON_PRETTY_PRINT));
header("Location: admin.php");
?>
