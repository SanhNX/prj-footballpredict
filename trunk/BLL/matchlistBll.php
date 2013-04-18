<?php

/**
 * @author thanh
 * @copyright 2013
 */
 
function getMatchList($typeLeaguesId) {
    $sql = "SELECT * FROM tbl_matchlist Where TypeLeaguesId = '".$typeLeaguesId."' AND Result = ''";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result = array();
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Matchlist();
        $item->Id = $seletedItem['Id'];
        $item->ClubA = $seletedItem['ClubA'];
        $item->ClubB = $seletedItem['ClubB'];
        $item->StartTime = $seletedItem['StartTime'];
        $item->Result = $seletedItem['Result'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getAdminMatchList($typeLeaguesId) {
    $sql = "SELECT * FROM tbl_matchlist Where TypeLeaguesId = '".$typeLeaguesId."' AND Result = '' AND StartTime BETWEEN '' AND (SELECT ADDDATE(CURDATE(), INTERVAL 3 DAY))";
    $queryResult = mysql_query($sql);
    $i = 0;
    $result = array();
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Matchlist();
        $item->Id = $seletedItem['Id'];
        $item->ClubA = $seletedItem['ClubA'];
        $item->ClubB = $seletedItem['ClubB'];
        $item->StartTime = $seletedItem['StartTime'];
        $item->Result = $seletedItem['Result'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function updateResult($id, $result) {
    $result = mysql_real_escape_string($result);
//    echo '<script>alert("'.$result.'");</script>';
    $sql= " UPDATE tbl_matchlist SET Result = '".$result."' WHERE id = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
}

?>