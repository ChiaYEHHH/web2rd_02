<?php
include_once "base.php";

dd($_POST);
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $User->del($id);
        }
    }
}

to("../admin.php?do=acc");
