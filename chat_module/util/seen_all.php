<?php

// SAME FUNCTION AS mark_seen.php

// Root directory
$root_env = dirname(__DIR__, 2);
 
// Database Connection (You can use your own connection class or leave it like that nalang hehe)
include("{$root_env}/chat_module/cfg/config.php");

// Check connection stat
if ($db->connect_error) {
    die("Connection failed: {$db->connect_error}");
}

// Ito yung userid nung magrerecieve ng message
$recieverID = isset($_GET['recvid']) ? $_GET['recvid'] : null;

// Simple Update Query lang to, walang data na irereturn
$sql = "UPDATE inbox SET status = 'seen' WHERE reciever = '{$recieverID}'";

// Balik sa inbox page after imark as seen
if (mysqli_query($db, $sql))
{ 
    header("Location: http://localhost/FlipTrade/chat_module/inbox.php");
} 
else 
{
    echo "A problem has occurred while updating inbox: " . mysqli_error($db);
}

$db -> close();
 
?>
 