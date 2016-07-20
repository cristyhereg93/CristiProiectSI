<?php
//insereaza mesajele in baza de date

require_once '../config.php';
require_once '../encrypt.php';

session_start();

$id = $_SESSION['ID'];
$message = $_POST['msg'];

$query = "INSERT INTO `message` VALUES (null,'{$id}','{$crypt->encode($message)}')";

mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

echo 1;
?>

