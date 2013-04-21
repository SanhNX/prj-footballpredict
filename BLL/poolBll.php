<?php
function getUser_byId($id) {
    $sql = "SELECT * FROM tbl_user WHERE Id = '".$id."' ";
    $queryResult = mysql_query($sql) or die ("Couldn't execute query.");
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new User();
    $item->Email = $seletedItem['Email'];
    $item->FullName = $seletedItem['FullName'];
    $item->Avatar = $seletedItem['Avatar'];
    $item->DOB = $seletedItem['DOB'];
    $item->Gender = $seletedItem['Gender'];
    $item->FavoriteTeam = $seletedItem['FavoriteTeam'];
    $item->Scores = $seletedItem['Scores'];
    return $item;
}
function getUsersOfGroup($clubId) {
    
    $sql = "SELECT * FROM  tbl_groups where ClubId = '".$clubId."' ";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new UsersListOFGroup();
        $item->UserId = $seletedItem['MemberId'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}
function getGroupsOfUser($userId) {
    
    $sql = "SELECT * FROM  tbl_groups where MemberId = '".$userId."' ";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new GroupsListOfUser();
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
    
    if(groupExist($clubId, $userId) == -1 && count(getGroupsOfUser($userId)) < 4 ){
//        echo '<script>alert("'.$clubId."----".$userId."----".count(getGroupsOfUser($userId)).'");</script>';
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
function leavegroup($clubId, $userId) {
    $sql = "DELETE FROM tbl_groups WHERE ClubId = '".$clubId."'  AND MemberId = '".$userId."' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        return -1;
    } else {
        return 1;
    }
}

function getClubs($keyword) {
    
    if($keyword != "" || $keyword != 'undefined' || $keyword != null)
        $sql = "SELECT * FROM  tbl_club Where Name LIKE '%".$keyword."%' ";
    else
        $sql = "SELECT * FROM  tbl_club ";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result;
    if($queryResult)
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