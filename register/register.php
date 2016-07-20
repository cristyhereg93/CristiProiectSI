<?php
    session_start();
    unset($_SESSION['USER']);
?>

<html>
    <head>
        <title>Secure Chat</title>
        
        <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../js/checkRegister.js"></script>
        
        <link type="text/css" rel="stylesheet" href="../main.css" />
    </head>
    <body>
        <div align="center">
            <div id='container' class='container' style="width: 30%;">
                    <form method='POST' action='addNewUser.php' class="form">
                        <input type='text' id='username' name='username' placeholder="Username"/>
                        <input type='password' id='password' name='password' placeholder="Password"/>
                        <input type='password' id='r_password' name='r_password' placeholder="Repeat Password"/>
                        <input type='submit' class='button' value="Submit"/>
                    </form>
                <br/>
                <div id="err" align="center">
                        <div id="ERRemail1"><font color="red">Username is available !</font></div>
                        <div id="ERRpassword2"><font color="red">Passwords must match !</font></div>

                </div>
            </div>
        </div>
    </body>
</html>
