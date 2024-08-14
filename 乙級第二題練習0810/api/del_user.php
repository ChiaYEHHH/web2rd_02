<?php
include_once "base.php";
// dd($_POST);

foreach ($_POST['ids'] as $id) {
    echo  $User->del($id);
}
