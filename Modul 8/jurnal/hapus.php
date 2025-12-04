<?php
$id = $_GET["id"];
$data = json_decode(file_get_contents("data.json"), true);

unset($data[$id]);
$data = array_values($data);

file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));

header("Location: admin.php");
?>
