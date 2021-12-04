<?php

// THIS ACTS LIKE A BACKGROUND MESSAGE NOTIFIER

// Database Connection (You can use your own connection class or leave it like that nalang hehe)
include("cfg/config.php");

session_start();

// Check connection stat
if ($db->connect_error) {
    die("Connection failed: {$db->connect_error}");
}

$result = array();

// Your Current User ID
$current_uid = $_SESSION['Fliptrade_userid'];

// Sa background task ito, it means nageexecute sa background using AJAX Get Request.
// Parang ito yung nagbabantay sa incoming messages, kapag may new message, inonotify ka nya
// This will use your userid and checks for unread messages in the inbox.
// Kapag may new message sa inbox, ichecheck neto if para sayo yung message na yun using your userid.
// There are 2 types of message status in the inbox. ---UNREAD at yung SEEN.
// Kapag yung reciever_userid ng inbox is equals userid mo, then ichecheck nya if UNREAD yung message.
// Kapag UNREAD, inonotify ka. Kung SEEN na yung message, walang notification.

// $items = $db -> query("SELECT COUNT(*) AS msgCount FROM `chat` WHERE recieved_by = '{$current_uid}' "); --> Buggy Code, dont use!
$items = $db -> query("SELECT COUNT(*) AS msgCount FROM inbox WHERE reciever = '{$current_uid}' AND status = 'unread' ");

while ($row = $items -> fetch_assoc())
{
    $result['items'][] = $row;
}

$db -> close();
//
// RETURN DATA AS JSON
//
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json', true);

echo json_encode($result);

?>