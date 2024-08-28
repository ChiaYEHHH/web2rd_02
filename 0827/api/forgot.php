<?php
include_once "base.php";

$data = $User->find(['email' => $_POST['email']]);

if (!empty($data)) {
    echo "您的密碼為:{$data['pw']}";
} else {
    echo "查無此資料";
}
