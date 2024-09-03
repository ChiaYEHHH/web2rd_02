<?php
include_once "base.php";

// dd($_POST);

foreach ($_POST as $del) {
    foreach ($del as $idx => $id) {
        $User->del($id);
    }
}

to("../admin.php?do=acc");
