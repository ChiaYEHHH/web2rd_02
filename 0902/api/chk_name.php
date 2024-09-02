<?php
include_once "base.php";

echo $User->count(['name' => $_POST['name']]);
