<?php

/**
 * @author thanh
 * @copyright 2013
 */

function getListPredictByMatchId($matchId) {
    
     $sql = "SELECT * FROM tbl_predict Where matchId = $matchId" ;
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not login: ' . $id . mysql_error();
        exit;
    }
    $i = 0;
    $result;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Predict();
        $item->Id = $seletedItem['Id'];
        $item->UserId = $seletedItem['UserId'];
        $item->MatchId = $seletedItem['MatchId'];
        $item->PredictResult = $seletedItem['predictResult'];
        
        $result[$i] = $item;
        $i++;
    }
    return $result;
    
}

function getUserById($id) {
    $sql = "SELECT * FROM tbl_user Where Id = $id";
    $queryResult = mysql_query($sql);
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
    
    $seletedItem = mysql_fetch_array($queryResult);
    if (mysql_num_rows($queryResult) > 0)
        return $seletedItem['Scores'];
    else
        return -1;
    
    
}

function updateUserById($id, $scores) {
    $sql = "UPDATE `tbl_user`
	SET `Scores`= $scores 
	WHERE `Id` = $id";
    $queryResult = mysql_query($sql);
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }   
}


function countPoint ($matchId, $resultA, $resultB) {
    $resultPredictList = getListPredictByMatchId($matchId);
    
    if (!empty($resultPredictList)) {
        
        for ($i = 0; $i < count($resultPredictList); $i++) {
            
            $itemPredict = $resultPredictList[$i];
            
            $predictResult = $itemPredict->PredictResult;
            
            $pieces = explode("-", $predictResult);
            
            $predictResultA = (int)$pieces[0];
            $predictResultB = (int)$pieces[1]; 
            
            $scoresUser = getUserById($itemPredict->UserId);
            if($scoresUser != -1) {
                
                // Ð?i th?ng công 40 diem doi A thang doi B
                if (($predictResultA - $predictResultB) > 0 &&
                       ($resultA - $resultB) > 0 ) {
                        $scoresUser = $scoresUser + 40;
                        
                // Ð?i th?ng công 40 diem doi B thang doi A    
                } else if (($predictResultB - $predictResultA) > 0 &&
                       ($resultB - $resultA) > 0 ) {
                        $scoresUser = $scoresUser + 40;
                        
                // Ð?i th?ng công 40 diem doi B hòa doi A 
                } else if (($predictResultB - $predictResultA) == 0 &&
                       ($resultB - $resultA) == 0 ) {
                        $scoresUser = $scoresUser + 40;
                }
                
                // d? doán dúng t? s? hòa +20
                if (($resultA == $predictResultA) &&
                       ($resultB == $predictResultB)) {
                        $scoresUser = $scoresUser + 20;
                }
                
                // doichunha da vaoluoi +10diem
                if (($resultA > 0) &&
                       ($predictResultA > 0)) {
                        $scoresUser = $scoresUser + 10;
                }
                
                // doichunha da vaoluoi +10diem
                if (($resultB > 0) &&
                       ($predictResultB > 0)) {
                        $scoresUser = $scoresUser + 10;
                }
                
                // update diem cho user
                updateUserById($itemPredict->UserId, $scoresUser);
            }
            
            
        
        }
    }
     
}

?>