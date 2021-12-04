<?php
// Root directory
$root_env = dirname(__DIR__, 2);
 
// Database Connection (You can use your own connection class or leave it like that nalang hehe)
include("{$root_env}/chat_module/cfg/config.php");

// Check connection stat
if ($db->connect_error) {
    die("Connection failed: {$db->connect_error}");
}

// Ito yung inbox ID nung message na nagpop-up sa inbox, pero invisible ito..
// Needed lang ito for UPDATE query
$id = isset($_GET['inboxid']) ? $_GET['inboxid'] : null;

// Trader's User ID
$trader_uid = isset($_GET['trader_uid']) ? $_GET['trader_uid'] : null;

// The Logged On User's ID (You)
$current_uid = isset($_GET['current_uid']) ? $_GET['current_uid'] : null;

// Simple Update Query lang to, walang data na irereturn
$sql = "UPDATE inbox SET status = 'seen' WHERE id = {$id}";

// Mark the message as seen then launch the messenger page
if (mysqli_query($db, $sql))
{
    header("Location: http://localhost/FlipTrade/message.php?trader_uid={$trader_uid}&current_uid={$current_uid}");
}
else
{
    echo "Oops! something went wrong";
}

?>