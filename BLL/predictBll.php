<?php

function getMatchListOfLeagues($typeLeaguesId, $tour) {
    $sql = "SELECT * FROM tbl_matchlist Where TypeLeaguesId = '".$typeLeaguesId."' AND TourId = '".$tour."'";
    $queryResult = mysql_query($sql) or die ("Couldn't execute query.");
    $i = 0;
    $result = array();
    while ($seletedItem = mysql_fetch_array($queryResult,MYSQL_ASSOC)) {
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

function getPredictListOfUser($userId) {
    $sql = "SELECT * FROM tbl_predict Where UserId = '".$userId."'";
    $queryResult = mysql_query($sql) or die ("Couldn't execute query.");
    $i = 0;
    $result = array();
    while ($seletedItem = mysql_fetch_array($queryResult,MYSQL_ASSOC)) {
        $item = new Predict();
        $item->MatchId = $seletedItem['MatchId'];
        $item->PredictResult = $seletedItem['predictResult'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getClubListOfLeagues($leaguesId) {
    $sql = "SELECT * FROM tbl_clublistofleagues Where TypeLeaguesId = '".$leaguesId."'";
    $queryResult = mysql_query($sql) or die ("Couldn't execute query.");
    $i = 0;
    $result = array();
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new ClubListOfLeagues();
        $item->Id = $seletedItem['Id'];
        $item->ClubId = $seletedItem['ClubId'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getClub_byId($id) {
    $sql = "SELECT * FROM tbl_club  WHERE Id = '".$id."'";
    $queryResult = mysql_query($sql) or die ("Couldn't execute query.");
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new Club();
    $item->Name = $seletedItem['Name'];
    $item->Logo = $seletedItem['Logo'];
    $item->Played = $seletedItem['Played'];
    $item->Points = $seletedItem['Points'];
    $item->Won = $seletedItem['Won'];
    $item->Lost = $seletedItem['Lost'];
    return $item;
}

function getPredict_byUIdMId($userId, $matchId) {
    $sql = "SELECT * FROM tbl_predict  WHERE UserId = '".$userId."' AND MatchId = '".$matchId."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $count = mysql_num_rows($queryResult);
    return $count;
}

function addPredict($userId, $matchId, $result){
    $userId = mysql_real_escape_string($userId);
    $matchId = mysql_real_escape_string($matchId);
    $result = mysql_real_escape_string($result);
//    echo '<script>alert("'.$result.'");</script>';
    $sql = "INSERT INTO tbl_predict(UserId, MatchId, predictResult) VALUES ($userId, $matchId, '$result')";
    $queryResult = mysql_query($sql);
    if ($queryResult)
        return mysql_insert_id();
    else
        return -1;
}

function updatePredict($userId, $matchId, $result) {
    $sql = "UPDATE tbl_predict SET predictResult = '$result' WHERE UserId = '".$userId."' AND MatchId = '".$matchId."'";
    $queryResult = mysql_query($sql);
    return $queryResult;
}

function deleteDichVu($id) {
    $sql = "DELETE FROM `tb_dichvucuoi` WHERE `tb_dichvucuoi`.`Id` = $id;";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'ERROR!';
        exit;
    } else {
        echo 'SUCCESS!';
    }
}

?>