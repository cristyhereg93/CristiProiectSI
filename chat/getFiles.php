<?php
//ia fisierele din baza de date

require_once '../config.php';
require_once '../encrypt.php';

if ($_POST['first_run'] == 1)
{
    $query = "SELECT `id`,`username`,`file` FROM `files`
        ORDER BY `id` DESC";

    $result = mysqli_query($mysqli, $query);

    while ($row = mysqli_fetch_array($result)) {
        $chatResult[$row['id']]['file'] = $row['file'];
        $chatResult[$row['id']]['username'] = $row['username'];
    }

    echo json_encode($chatResult, JSON_FORCE_OBJECT);
}
else 
{
    $query = "SELECT `id`,`username`,`file` FROM `files`
            ORDER BY `id` DESC 
            LIMIT 1";

    $result = mysqli_query($mysqli, $query);

    while ($row = mysqli_fetch_array($result)) {
        $chatResult['id'] = $row['id'];
        $chatResult['file'] = $row['file'];
        $chatResult['username'] = $row['username'];
    }

    echo json_encode($chatResult, JSON_FORCE_OBJECT);
}

?>

