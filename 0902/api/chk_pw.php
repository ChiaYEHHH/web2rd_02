<?php
include_once "base.php";
$result = $User->count(['name' => $_POST['name'], 'pw' => $_POST['pw']]);

if ($result >= 1) {
    $_SESSION['user'] = $_POST['name'];
}

echo $result;
