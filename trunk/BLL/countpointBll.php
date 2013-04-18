<?php

/**
 * @author thanh
 * @copyright 2013
 */

function getListPredictByMatchId($matchId) {
    
     $sql = "SELECT * FROM tbl_predict Where matchId = '".$matchId."'" ;
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
    $sql = "SELECT * FROM tbl_user Where Id = '".$id."'";
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
	SET `Scores`= '".$scores."' 
	WHERE `Id` = '".$id."'  ";
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
                
                // �?i th?ng c�ng 40 diem doi A thang doi B
                if (($predictResultA - $predictResultB) > 0 &&
                       ($resultA - $resultB) > 0 ) {
                        $scoresUser = $scoresUser + 40;
                        
                // �?i th?ng c�ng 40 diem doi B thang doi A    
                } else if (($predictResultB - $predictResultA) > 0 &&
                       ($resultB - $resultA) > 0 ) {
                        $scoresUser = $scoresUser + 40;
                        
                // �?i th?ng c�ng 40 diem doi B h�a doi A 
                } else if (($predictResultB - $predictResultA) == 0 &&
                       ($resultB - $resultA) == 0 ) {
                        $scoresUser = $scoresUser + 40;
                }
                
                // d? do�n d�ng t? s? h�a +20
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

function pointClub ($idClubA, $idClubB, $resultA, $resultB) {
	
	if ($resultA > $resultB) {
	// doi thang
		updatePointClub($idClubA, 1, 3, 1, 0);
	// doi thua
		updatePointClub($idClubB, 1, 0, 0, 1);
	} else if ($resultB > $resultA) {
		// doi thang
		updatePointClub($idClubB, 1, 3, 1, 0);
	// doi thua
		updatePointClub($idClubA, 1, 0, 0, 1);
	} else {
		// doi thang
		updatePointClub($idClubB, 1, 1, 0, 0);
	// doi thua
		updatePointClub($idClubA, 1, 1, 0, 0);
	} 
	
}


function updatePointClub ($id, $pl, $p, $w, $l) {
	
	$clubResult = getClubPointById($id);
	if (!empty($clubResult)) {
		$played = (int)$clubResult->Played + (int)$pl;
		$points = (int)$clubResult->Points + (int)$p;
		$won = (int)$clubResult->Won + (int)$w;
		$lost = (int)$clubResult->Lost + (int)$l;
		

		$sql = "UPDATE tbl_club SET  `Played` = '".$played."' , `Points` = '".$points."' , `Won` = '".$won."' , `Lost` = '".$lost."' WHERE `Id` = '".$id."'";
		
		$queryResult = mysql_query($sql);
		
		if (!$queryResult) {
			echo 'Error: ' . $id . mysql_error();
			return -1;
		} 
	}
	  
}

function getClubPointById($id) {
    
     $sql = "SELECT * FROM tbl_club Where Id = '".$id."'" ;
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not login: ' . $id . mysql_error();
        exit;
    }
	$seletedItem = mysql_fetch_array($queryResult);
	$item = new Club();
	$item->Played = $seletedItem['Played'];
	$item->Points = $seletedItem['Points'];
	$item->Won = $seletedItem['Won'];
	$item->Lost = $seletedItem['Lost'];
    return $item;
    
}

?>