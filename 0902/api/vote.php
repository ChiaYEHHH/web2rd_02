<?php
include_once "base.php";

$que = $Que->find(['id' => $_POST['que']]);
$vote = $Que->find(['id' => $_POST['vote']]);
$que['vote']++;
$vote['vote']++;

$Que->save($que);
$Que->save($vote);
