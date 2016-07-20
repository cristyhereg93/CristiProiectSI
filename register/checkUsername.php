<?php
require_once ('../config.php');

$username = $_POST['username'];

$query = "SELECT * FROM `users` where `username` = '{$username}'";

$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) == 1)
{
    //exista
    echo 1;
}
else
{
    //nu exista
    echo 0;
}
?>
