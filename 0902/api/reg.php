<?php
include_once "base.php";

$result = $User->count(['name' => $_POST['name']]);

if ($result == 0) {
    unset($_POST['pw2']);
    $User->save($_POST);
}

echo $result;
