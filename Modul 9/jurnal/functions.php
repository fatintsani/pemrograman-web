<?php
// functions.php
require_once 'config.php';


function flash($msg = null) {
if ($msg === null) {
if (!empty($_SESSION['flash'])) {
$m = $_SESSION['flash'];
unset($_SESSION['flash']);
return $m;
}
return null;
}
$_SESSION['flash'] = $msg;
}


function is_logged_in() {
return !empty($_SESSION['user_id']);
}