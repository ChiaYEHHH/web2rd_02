<?php
include_once "base.php";
if ($User->count(['email' => $_POST['email']]) >= 1) {
    $result = $User->find(['email' => $_POST['email']])['pw'];
    echo "您的密碼為:" . $result;
} else {
    echo "查無此資料";
}
