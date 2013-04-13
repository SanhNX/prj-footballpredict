<?php

function getGroupsOfUser($userId) {
    
    $sql = "SELECT * FROM  tbl_groups where MemberId = '".$userId."' ";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Groups();
        $item->ClubId = $seletedItem['ClubId'];

        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function groupExist($clubId, $userId) {
    $sql = "SELECT * FROM tbl_groups Where ClubId = '".$clubId."' AND MemberId = '".$userId."' ";
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
function insertGroup ($clubId, $userId){
    
    if(groupExist($clubId, $userId) == -1 && count(getGroupsOfUser($userId)) < 3 ){
//        echo '<script>alert("'.count(getGroupsOfUser($userId)).'");</script>';
        $sql = "INSERT INTO tbl_groups ( ClubId, MemberId) VALUES ('$clubId', '$userId')";              
        $queryResult = mysql_query($sql) or die(mysql_error());

        if (!$queryResult) {
            echo 'Error: ' . $id . mysql_error();
            return -1;
        }

        if ($queryResult)
            return 1;
        else
            return -1;
    }else
        return -1;
}

function getClubs($keyword) {
    
    if($keyword != "" || $keyword != 'undefined' || $keyword != null)
        $sql = "SELECT * FROM  tbl_club Where Name LIKE '%".$keyword."%' ";
    else
        $sql = "SELECT * FROM  tbl_club ";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Club();
        $item->Id = $seletedItem['Id'];
        $item->Name = $seletedItem['Name'];
        $item->Logo = $seletedItem['Logo'];
        $item->Played = $seletedItem['Played'];
        $item->Points = $seletedItem['Points'];
        $item->Won = $seletedItem['Won'];
        $item->Lost = $seletedItem['Lost'];

        $result[$i] = $item;
        $i++;
    }
    return $result;
}

?>