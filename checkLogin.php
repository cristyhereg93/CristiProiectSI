<?php
//verifica login
require_once ('config.php');
session_start();

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $password = hash("SHA512", $password);
    
    $query = "SELECT * FROM `users` where `username` = '{$username}' and `password` = '{$password}'";

    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($result) == 1)
    {
        //Login reusit
        $row = mysqli_fetch_array($result);
        $_SESSION['ID'] = $row['id'];
        $_SESSION['USER'] = $row['username'];
        
        header('Location: chat/chat.php');
    }else{
        //Invalid username or password
        header('Location: index.php?err=1');
    }
    
} else {
    die('Invalid Requests');
}