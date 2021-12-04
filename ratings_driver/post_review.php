<?php

include("cfg/config.php");

$comment = isset($_POST["input-comment-box"]) ? $_POST["input-comment-box"] : null;
$rating = isset($_POST["star-rating-amount"]) ? $_POST["star-rating-amount"] : null;
$myuid = isset($_POST['myuid']) ? $_POST['myuid'] : null;
$postid = isset($_POST['postid']) ? $_POST['postid'] : null;
$reviewed = isset($_POST['reviewed']) ? $_POST['reviewed'] : null;

$isreviewed = false;

if ($reviewed != "")
{
    $r = intval($reviewed);
    if ($r > 0) 
        $isreviewed = true;
    else
        $isreviewed = false;
}

// echo "Rating : {$rating} ; Comment : {$comment}' UID = {$myuid}";
// $sql = "INSERT INTO ratings (productid, ratedby, rating, comment) VALUES ('{$postid}', '{$myuid}', '{$rating}', '{$comment}') " 
//     . "ON DUPLICATE KEY UPDATE rating = '{$rating}', comment = '{$comment}' ";

$sqlIns = "INSERT INTO ratings (productid, ratedby, rating, comment) VALUES ('{$postid}', '{$myuid}', '{$rating}', '{$comment}')";
$sqlUpd = "UPDATE ratings SET rating = '{$rating}', comment = '{$comment}' WHERE ratedby = '{$myuid}' AND productid = '{$postid}'";
$tbl_trade_query = "";

switch($rating)
{
    case "1":
        $tbl_trade_query = "UPDATE tbl_trade SET ratingone = ratingone + 1 WHERE postid = '{$postid}'";
        break;
    case "2":
        $tbl_trade_query = "UPDATE tbl_trade SET ratingtwo = ratingtwo + 1 WHERE postid = '{$postid}'";
        break;
    case "3":
        $tbl_trade_query = "UPDATE tbl_trade SET ratingthree = ratingthree + 1 WHERE postid = '{$postid}'";
        break;
    case "4":
        $tbl_trade_query = "UPDATE tbl_trade SET ratingfour = ratingfour + 1 WHERE postid = '{$postid}'";
        break;
    case "5":
        $tbl_trade_query = "UPDATE tbl_trade SET ratingfive = ratingfive + 1 WHERE postid = '{$postid}'";
        break; 
}

$db -> query($tbl_trade_query);

if ($isreviewed)
{
    if (mysqli_query($db, $sqlUpd))
    {
        if (isset($_SERVER["HTTP_REFERER"])) { header("Location: " . $_SERVER["HTTP_REFERER"]); } 
    }
}
else
{ 
    if (mysqli_query($db, $sqlIns))
    {
        if (isset($_SERVER["HTTP_REFERER"])) { header("Location: " . $_SERVER["HTTP_REFERER"]); } 
    }
}

?>