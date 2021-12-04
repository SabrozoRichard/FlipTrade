<?php

// THIS FUNCTION GETS THE TRADER'S FULLNAME USING HIS UID
function getTradersFullname($db, $uid)
{
    // Root directory
    //$root_env = dirname(__DIR__, 2);
 
    // Retrieve data from database
    $sql = "SELECT firstname, lastname FROM tbl_user WHERE userid = '{$uid}'";
    
    // Datatable
    $result = $db->query($sql);

    // Store fullname here
    $fullname = '';

    // Process the data retrieved from datatable
    if ($result->num_rows > 0) 
    {
        // Let's expect the datatable to return only one row
        $row = $result->fetch_assoc();

        // Build the fullname into a complete string
        $fullname = "{$row['firstname']} {$row['lastname']}";
    }

    // Finally return the string
    return $fullname;
}

// THIS FUNCTION GETS THE TRADER'S DISPLAY PIC USING HIS UID
function getTradersDP($db, $uid)
{
    // Retrieve data from database
    $sql = "SELECT profile_img FROM tbl_user WHERE userid = '{$uid}'";

    // Datatable
    $result = $db->query($sql);

    // Store dp path here
    $displaypic = '';

     // Process the data retrieved from datatable
    if ($result->num_rows > 0) 
    {
        // Let's expect the datatable to return only one row
        $row = $result->fetch_assoc();

        // Retrieve the display pic path from datatable
        $displaypic = $row['profile_img'];
    }

    // Finally return the string
    return $displaypic;
}

?>