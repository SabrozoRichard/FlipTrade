<?php

function GetReviewersName ($db, $reviewerid)
{
    $reviewerQry = mysqli_fetch_assoc(mysqli_query($db, "SELECT firstname, lastname FROM tbl_user WHERE userid = '{$reviewerid}'"));
    $reviewer = "{$reviewerQry['firstname']} {$reviewerQry['lastname']}";

    return $reviewer;
}

?>