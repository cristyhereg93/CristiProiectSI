<?php
//ia mesagele din baza de date

require_once '../config.php';
require_once '../encrypt.php';

$query = "SELECT m.`message_id`,u.`username`,m.`message` FROM `message` AS m
            INNER JOIN `users` AS u 
            ON m.`user_id` = u.`id`
            ORDER BY `message_id` DESC 
            LIMIT 1";

$result = mysqli_query($mysqli, $query);

while ($row = mysqli_fetch_array($result))
{
    $chatResult['id'] = $row['message_id']; 
    $chatResult['message'] = $crypt->decode($row['message']);
    $chatResult['username'] = $row['username'];
}

echo json_encode($chatResult, JSON_FORCE_OBJECT);

?>

