<?php
include_once "base.php";

// dd($_POST);
$result=$User->count($_POST);



if ($result > 0) {
    $_SESSION['user']=$_POST['name'];
    echo $result;
}
