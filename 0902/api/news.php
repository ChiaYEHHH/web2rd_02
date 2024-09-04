<?php
include_once "base.php";

// dd($_POST);

foreach ($_POST['id'] as  $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $News->del($id);
    }else{
        $data=$News->find($id);
        $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($data);
    }
}

to("../admin.php?do=news");