<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['USER']))
{
    header("Location: index.php?err=2");
}
?>

<html>
<head>
<title>Chat - Proiect SI</title>
<link type="text/css" rel="stylesheet" href="chat.css"/>

<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../js/core.js"></script>

</head>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <?php echo $_SESSION['USER']; ?><b></b></p>
        <p class="logout"><a id="exit" href="../index.php?err=3">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"></div>
     
    <div name="message" action="">
        <input id="message" type="text" size="63" />
        <button id="submit" type="submit">Send</button>
    </div>
    <br/>
    <form action="upload.php" method="post" enctype="multipart/form-data" target="_blank">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>
</div>
<br/>
<div id="uploadedFiles">
    
</div>

</body>
</html>