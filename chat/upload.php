<?php
require_once ('../encrypt.php');
require_once ('../config.php');
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $fileData = file_get_contents($target_file); //encrypt the file
            $encData = $crypt->encode($fileData);
            file_put_contents($target_file , $encData);
        echo "<br/>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        registerToDB($_SESSION['USER'], $target_file, $mysqli);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



function registerToDB($user,$file,$mysqli)
{
    $query = "insert into `files` values (null,'{$user}','{$file}')";
    
    mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
}
?>