<?php
include_once "base.php";

$chk = $User->count($_POST);
if ($chk > 0) {
    $_SESSION['user'] = $_POST['acc'];
    echo $chk;
}
