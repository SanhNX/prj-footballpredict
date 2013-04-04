<?php

/**
 * @author thanh
 * @copyright 2013
 */

function login ($email, $pword) {
    $sql = "SELECT * FROM tbl_user Where Password = $pword AND Email = '$email'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not login: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new User();
    $item->Id = $seletedItem['Id'];
    $item->Email = $seletedItem['Email'];
    $item->FullName = $seletedItem['FullName'];
    $item->Avatar = $seletedItem['Avatar'];
    $item->DOB = $seletedItem['DOB'];
    $item->Gender = $seletedItem['Gender'];
    $item->FavoriteTeam = $seletedItem['FavoriteTeam'];
    $item->Scores = $seletedItem['Scores'];
    return $item;
}

function emailExist($email) {
    $sql = "SELECT * FROM tbl_user Where Email = '$email'";
    $queryResult = mysql_query($sql);
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
    
    if (mysql_num_rows($queryResult) > 0)
        return  1;
    else
        return -1;
}


function insertUser ($name, $email, $pword, $bod, $gender, $avatar){
    $sql = "INSERT INTO `footballpredict`.`tbl_user` 
                ( `Email`, `Password`, `FullName`, `Avatar`, `Dob`, `Gender`, `Scores`) 
                VALUES ('$email', '$pword', '$name', '$avatar', '$bod', $gender, 0);";              
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
    
    if ($queryResult)
        return mysql_insert_id();
    else
        return -1;
}
?>