<?php

include("cfg/config.php");

// Check connection stat
if ($db->connect_error) {
    die("Connection failed: {$db->connect_error}");
}

// MODULE THAT GENERATES RANDOM FILENAME
include("rand_file.php");
 
// Send the media
if (isset($_FILES["upload-media"]["name"]))
{ 
    //
    // HTTP REQUEST VARS
    //
    // Sender's UserID
    $sender_userid = isset($_POST['sender_userid']) ? $_POST['sender_userid'] : null; 

    // Senders name
    $from = isset($_POST['from']) ? $_POST['from']: null;

    // Sender's Chat Session ID
    $sender_chatses = isset($_POST['sender_chatses']) ? $_POST['sender_chatses'] : null; 

    // Sender's Display Pic
    $senderdp = isset($_POST['senderdp']) ? $_POST['senderdp'] : null; 

    // Reciever's UserID
    $reciever_userid = isset($_POST['reciever_userid']) ? $_POST['reciever_userid'] : null; 

    // Filename
    $filename = $_FILES["upload-media"]["name"];

    // Upload Location
    $location = "media/{$filename}";

    // Get the file extension
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Allowed file extensions for image : jpg, png, gif
    $allowed_exts = array("jpg", "jpeg", "png", "gif");

    // For sending file upload status into AJAX
    $response = 0;

    // If current file extension is in the allowed list, then upload
    if (in_array($file_extension, $allowed_exts))
    {
         // Generate a random filename of 32 chars
         $rand_token = getToken(32);
         $rand_fname = "{$rand_token}.{$file_extension}";

         // Save the image (path) into database after a successful upload
         // Using its random name
        if (move_uploaded_file($_FILES['upload-media']['tmp_name'], "media/{$rand_fname}"))
        {
            //SaveAttachmentReference($sender_userid, $rand_fname, $from, $sender_chatses);

             // Save the message into "chat" table
            $sql = "INSERT INTO chat (recieved_by, message, sender, csid, msgtype) VALUES ('{$sender_userid}', '{$rand_fname}','{$from}','{$sender_chatses}', 'media')";

            // UPDATE THE INBOX AFTER A SUCCESSFUL SEND
            if (mysqli_query($db, $sql))
            {
                // Set timezone to manila philippines
                date_default_timezone_set('Asia/Manila');

                // Timestamp (For inbox update)
                $now = date("Y-m-d h:i:s");

                // Update the inbox
                $inboxsql = "INSERT INTO inbox (message, sender, senderdp, reciever, status, senderuid, csid)  VALUES('Sent a photo.', '{$from}', '{$senderdp}', '{$reciever_userid}', 'unread', '{$sender_userid}','{$sender_chatses}')" . 
                "ON DUPLICATE KEY UPDATE message = 'Sent a photo', status = 'unread', created = '{$now}'";

                if (mysqli_query($db, $inboxsql))
                {
                    $response = 1;
                }
            }
        }
    }  


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json', true);

    echo $response;
    exit;
}
 
?>