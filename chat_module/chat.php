<?php

// Database Connection (You can use your own connection class or leave it like that nalang hehe)
include("cfg/config.php");

// Check connection stat
if ($db->connect_error) {
    die("Connection failed: {$db->connect_error}");
}

$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from']: null;

// Sender's Chat Session ID
$sender_chatses = isset($_POST['sender_chatses']) ? $_POST['sender_chatses'] : null; 

// Reciever's Chat Session ID -> buggy code => dont use but dont delete yet
$reciever_chatses = isset($_POST['reciever_chatses']) ? $_POST['reciever_chatses']: null;

// Sender's UserID
$sender_userid = isset($_POST['sender_userid']) ? $_POST['sender_userid'] : null; 

// Sender's Display Pic
$senderdp = isset($_POST['senderdp']) ? $_POST['senderdp'] : null; 

// Reciever's UserID
$reciever_userid = isset($_POST['reciever_userid']) ? $_POST['reciever_userid'] : null; 

// SEND MESSAGE
if (!empty($message) && !empty($from) && !empty($sender_chatses))
{
    // Save the message into "chat" table
    $sql = "INSERT INTO chat (recieved_by, message, sender, csid, msgtype) VALUES ('{$sender_userid}', '{$message}','{$from}','{$sender_chatses}', 'text')";
    $result['send_status'] = $db -> query($sql);
    
    // Set timezone to manila philippines
    date_default_timezone_set('Asia/Manila');

    // Timestamp (For inbox update)
    $now = date("Y-m-d h:i:s");

    // Save the message into "inbox" table ... By default, the sent message is marked "unread". 
    // Ang purpose nung "ON DUPLICATE KEY UPDATE --- para once lang magstore yung rows sa inbox para iwas flood."
    // Ang manyayare dun, if existing na yung sender, magu-UPDATE nalang yung row, hindi INSERT 

    //$inboxsql = "INSERT INTO inbox (message, sender, senderdp, reciever, status, senderuid, csid)  VALUES('{$message}', '{$from}', '{$senderdp}', '{$reciever_userid}', 'unread', '{$sender_userid}','{$sender_chatses}')";
    $inboxsql = "INSERT INTO inbox (message, sender, senderdp, reciever, status, senderuid, csid)  VALUES('{$message}', '{$from}', '{$senderdp}', '{$reciever_userid}', 'unread', '{$sender_userid}','{$sender_chatses}')" . 
                "ON DUPLICATE KEY UPDATE message = '{$message}', status = 'unread', created = '{$now}'";

    $result['inbox_status'] = $db -> query($inboxsql);
} 
//
// Retrieve the last message since the last "start" index
// Required yang start para once lang maretrieve yung new message.
// Kapag wala yan, magiinfinite loop / infinite append yung mga chat ..
//
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$items = $db -> query("SELECT * FROM chat WHERE id > {$start}"); // AND (csid = '{$sender_chatses}' OR csid = '{$reciever_chatses}') // -> buggy code => dont use but dont delete yet
//
// Retrieve data from datatable
//
while ($row = $items -> fetch_assoc())
{
    $result['items'][] = $row;
}

$db -> close();
//
// Return The Data As JSON
//
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json', true);

echo json_encode($result);

// what : ALLOW DATABASE TO STORE EMOJIES
// syntax : ALTER TABLE chat CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

?>