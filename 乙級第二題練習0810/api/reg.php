<?php 
include_once "base.php";
// dd($_POST);
unset($_POST['pw2']);
echo $User->save($_POST);