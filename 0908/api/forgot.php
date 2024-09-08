<?php
include_once "base.php";

$res=$User->count($_POST);
if ($res > 0) {
   $data=$User->find($_POST);
echo "您的密碼為:".$data['pw'];

}else{
echo "查無此資料";}