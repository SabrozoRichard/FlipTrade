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

// Same function lang din ito sa background_msg.php
// Pero ito, may extra columns sa SELECT

$start = isset($_GET['bstart']) ? intval($_GET['bstart']) : 0;
$items = $db -> query("SELECT * FROM inbox WHERE id > '{$start}' AND reciever = '{$current_uid}'"); // (reciever = '{$current_uid}' AND status = 'unread') ");

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