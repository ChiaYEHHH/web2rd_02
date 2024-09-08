<?php
include_once "base.php";

// 先存題目
$Que->save(['title' => $_POST['title'], 'subject_id' => 0]);

// 把題目id找出來
$subject_id = $Que->find(['title' => $_POST['title']])['id'];

// 把選項存進去 subject_id=題目id
foreach ($_POST['opts'] as $opt) {
    $Que->save(['title' => $opt, 'subject_id' => $subject_id]);
}
