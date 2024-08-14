<?php 
include_once "base.php";

echo $User->count($_POST);

if($chk){
    $_SESSION['user']=$_POST['acc'];
}

echo $chk;