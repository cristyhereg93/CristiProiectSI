<?php
require_once '../config.php';


if (isset($_POST['username'],$_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $password = hash('sha512', $password);
    
    $query = "INSERT INTO `users`(`username`,`password`) VALUES ('{$username}','{$password}')";

    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration Success</title>
        
        <link type="text/css" rel="stylesheet" href="../main.css" />
    </head>
    <body>
        <header><h2>Registration successful!</h2> </header>
        <table align='center'>
                <tr>
                    <td align = "center"><h4>You can now go back to the <a href="../index.php">login page</a> and log in</h4></td>
                </tr>
        </table>
    </body>
</html>

