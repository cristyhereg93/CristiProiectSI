<?php
session_start();
unset($_SESSION['USER']);
?>

<html>
    <head>
        <title>Secure Chat</title>
        <link type="text/css" rel="stylesheet" href="main.css" />
    </head>
    <body>
        <div align="center">
            <div id='login' class='container' style="width: 30%;">
                <form method='POST' action='checkLogin.php' class="form">
                    <?php
                    if (isset($_GET['err'])) {
                        switch ($_GET['err']) {
                            case 1 : echo "<font color='red'>Invalid Username or Password !</fond>";
                                break;
                            case 2 : echo "<font color='red'>Please Log In !</font>";
                                break;
                            case 3 : echo "<font color='green'><b>You Have Successfully Logged Out !</b></font>";
                                break;
                        }
                    }
                    ?>
                    <input type='text' id='username' name='username' placeholder="Username"/>

                    <input type='password' id='password' name='password' placeholder="Password"/>

                    <input type='submit' class='button' value="Submit"/>
                </form>
                <a href ='register/register.php'> New User?</a>
            </div>
        </div>
    </body>
</html>

