<?php
include_once "base.php";

$res=$User->count($_POST);
if ($res > 0) {
   $_SESSION['user']=$_POST['name'];

}
echo $res;