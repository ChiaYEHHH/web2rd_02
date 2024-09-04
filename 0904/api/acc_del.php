<?php
include_once "base.php";

foreach($_POST['del'] as $idx => $id){
    $User->del($id);
}

to("../admin.php?do=acc");