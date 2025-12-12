<<<<<<< HEAD
<?php
$id = $_GET["id"];
$data = json_decode(file_get_contents("data.json"), true);

unset($data[$id]);
$data = array_values($data);

file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));

header("Location: admin.php");
?>
=======
<?php
$id = $_GET["id"];
$data = json_decode(file_get_contents("data.json"), true);

unset($data[$id]);
$data = array_values($data);

file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));

header("Location: admin.php");
?>
>>>>>>> a4447ec6a2d97d2218d98cbecfac217cc39dd6df
