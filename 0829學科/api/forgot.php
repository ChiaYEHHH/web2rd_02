<?php
include_once "base.php";

// dd($_POST);
if($User->count(['email'=>$_POST['email']]) > 0){

    $data=$User->find(['email'=>$_POST['email']]);
    echo "您的密碼為:" . $data['pw'];
}else{
    echo "查無此資料";
}