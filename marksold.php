<?php

// DB Connection
$db = mysqli_connect("localhost", "root", "", "db_fliptrade");

// check connection
if (!$db) { echo 'Connection error: ' . mysqli_connect_error(); }

// POST ID
$postID = isset($_GET['postid']) ? $_GET['postid'] : null;

// Item Status => Soldout / Available
$stat = isset($_GET['stat']) ? $_GET['stat'] : null;

// Query To UPDATE item availability (status)
$query=mysqli_query($db,"SELECT * FROM tbl_trade WHERE postid = {$postID}");
$fetch=mysqli_fetch_array($query);
$quantity=$fetch['quantity'];
$total=$quantity-1;
$sql = "UPDATE tbl_trade SET status = '{$stat}', quantity='$total' WHERE postid = {$postID}";

// Pag successful yung update, balik tayo dun sa previous page
if (mysqli_query($db, $sql)) 
{
    GoBack();
} else { 
    echo "A problem has occurred while trying to update item availability.<br><br>" . mysqli_error($db);
}

// Function to go back to previous page
function GoBack()
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

// lastly, close the connection to database
mysqli_close($db);

?>