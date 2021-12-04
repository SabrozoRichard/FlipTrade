<?php

function getOneStarRating($db, $postid)
{
    $rating = mysqli_fetch_assoc(mysqli_query($db, "SELECT ratingone FROM tbl_trade WHERE postid = '{$postid}'"));
    $res = $rating['ratingone'];

    if ($res == "" || $res == null)
    {
        $res = "0";
    }

    return $res;
}

function getTwoStarRating($db, $postid)
{
    $rating = mysqli_fetch_assoc(mysqli_query($db, "SELECT ratingtwo FROM tbl_trade WHERE postid = '{$postid}'"));
    $res = $rating['ratingtwo'];

    if ($res == "" || $res == null)
    {
        $res = "0";
    }

    return $res;
}

function getThreeStarRating($db, $postid)
{
    $rating = mysqli_fetch_assoc(mysqli_query($db, "SELECT ratingthree FROM tbl_trade WHERE postid = '{$postid}'"));
    $res = $rating['ratingthree'];

    if ($res == "" || $res == null)
    {
        $res = "0";
    }

    return $res;
}

function getFourStarRating($db, $postid)
{
    $rating = mysqli_fetch_assoc(mysqli_query($db, "SELECT ratingfour FROM tbl_trade WHERE postid = '{$postid}'"));
    $res = $rating['ratingfour'];

    if ($res == "" || $res == null)
    {
        $res = "0";
    }

    return $res;
}

function getFiveStarRating($db, $postid)
{
    $rating = mysqli_fetch_assoc(mysqli_query($db, "SELECT ratingfive FROM tbl_trade WHERE postid = '{$postid}'"));
    $res = $rating['ratingfive'];

    if ($res == "" || $res == null)
    {
        $res = "0";
    }

    return $res;
}
//
// RETURNS INT
//
function getAverageRating($db, $postid)
{
    // formula : 
    // a = 1star
    // b = 2star
    // c = 3star
    // d = 4star
    // e = 5star
    // average = ((1 x a) + (2 x b) + (3 x c) + (4 x d) + (5 x e)) / (a+b+c+d+e)
    $a = getOneStarRating($db, $postid);
    $b = getTwoStarRating($db, $postid);
    $c = getThreeStarRating($db, $postid);
    $d = getFourStarRating($db, $postid);
    $e = getFiveStarRating($db, $postid);

    // get the total stars
    $z = ((1 * $a) + (2 * $b) + (3 * $c) + (4 * $d) + (5 * $e));

    // check if z results to zero, then return 0. else return the average
    if ($z <= 0) $z = 0;
    else $z /= ($a + $b + $c + $d + $e);
    
    // return as whole number rating
    return intval($z);
}
//
// RETURNS FLOAT
//
function getNumericalRating($db, $postid)
{
    $a = getOneStarRating($db, $postid);
    $b = getTwoStarRating($db, $postid);
    $c = getThreeStarRating($db, $postid);
    $d = getFourStarRating($db, $postid);
    $e = getFiveStarRating($db, $postid);

    // get the total stars
    $z = ((1 * $a) + (2 * $b) + (3 * $c) + (4 * $d) + (5 * $e));

    // check if z results to zero, then return 0. else return the average
    if ($z <= 0) $z = 0;
    else $z /= ($a + $b + $c + $d + $e);
    
    return $z;
}
//
// RETURNS STRING
//
function getRatingEquivalent($rating)
{
    $equiv = "";

    switch($rating)
    {
        case "1":
            $equiv = "Terrible";
            break;
        case "2":
            $equiv = "Poor";
            break;
        case "3":
            $equiv = "Average";
            break;
        case "4":
            $equiv = "Very Good";
            break;
        case "5":
            $equiv = "Excellent";
            break;
        default:
            $equiv = "Unrated";
            break;
    }

    return $equiv;
}

function getRatings($db, $productid)
{
    $ratings = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM ratings WHERE productid = '{$productid}'"));
    return $ratings;
}

?>