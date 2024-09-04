<?php
include_once "base.php";

$Que->save(['title' => $_POST['title'], 'subject_id' => 0]);

$subject_id = $Que->find(['title' => $_POST['title']])['id'];

foreach ($_POST['opts'] as $opt) {
    $Que->save(['title' => $opt, 'subject_id' => $subject_id]);
}
