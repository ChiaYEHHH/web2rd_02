<?php
include_once "base.php";
unset($_POST['pw2']);
// dd($_POST);
$res = $User->count(['name' => $_POST['name']]);
if ($res > 0) {
   $data = $User->find($_POST);
   echo "帳號重複";
} else {
   $User->save($_POST);
   echo "註冊完成，歡迎加入";
}
