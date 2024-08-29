<?php
include_once "base.php";


if ($User->count(['name' => $_POST['name']]) >= 1) {
    echo "帳號重複";
}else{
    unset($_POST['pw2']);
    $User->save($_POST);
    echo "註冊完成，歡迎加入";

}
