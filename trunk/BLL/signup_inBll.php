<?php

function checkLogin($email, $pass) {
    $sql = "SELECT * FROM  tbl_user WHERE Email = '" . $email . "' AND Password = '" . $pass . "' ";
    $result = mysql_query($sql);
    if (!$result) {
        echo 'Could not run query: ' . $email . mysql_error();
        exit;
    }
    // Mysql_num_row is counting table row
    $count = mysql_num_rows($result);
    return $count;
}
function getUserByEmailPass($email, $pass) {
    $sql = "SELECT * FROM  tbl_user WHERE Email = '" . $email . "' AND Password = '" . $pass . "' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $email . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new User();
    $item->Id = $seletedItem['Name'];
    $item->Email = $seletedItem['Email'];
    $item->Password = $seletedItem['Password'];
    $item->FullName = $seletedItem['FullName'];
    $item->Avatar = $seletedItem['Avatar'];
    $item->DOB = $seletedItem['DOB'];
    $item->Gender = $seletedItem['Gender'];
    $item->FavoriteTeam = $seletedItem['FavoriteTeam'];
    $item->Scores = $seletedItem['Scores'];
    return $item;
}
function changepass($new) {
    $sql = "UPDATE  tbl_user SET Password = '".$new."' WHERE Id = 1";
    $queryResult = mysql_query($sql);
    return $queryResult;
}

?>