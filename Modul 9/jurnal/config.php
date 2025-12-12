<?php
// config.php
$DB_HOST = '127.0.0.1';
$DB_NAME = 'web_praktikum';
$DB_USER = 'root';
$DB_PASS = '';


$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
die('Gagal koneksi ke database: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');


$base_url = '/';