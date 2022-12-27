<?php 
require_once("./main.php");

$id=$_GET["id"];

$control = $db->prepare('DELETE FROM firmuser WHERE Uid = ?');
$control->execute([$id]);


header('Location: UserList.php');