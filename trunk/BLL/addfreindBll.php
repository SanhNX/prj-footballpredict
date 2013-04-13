<?php
session_start();
include '../DAO/connection.php';

 if (isset($_POST['id'])) {
    $idFace1 = $_SESSION['IdFaceBook'];
	$req = $_POST['id'];
	$pieces = explode("-", $req);
	
	for ($i = 0 ; $i < count($pieces) ; $i++) {
	   $check = checkExistFriend($idFace1, $pieces[$i]);
	   if ($check < 1) {
	       insertFriend($idFace1, $pieces[$i]);
	   }
	}
 
 }


function checkExistFriend($idFace1, $idFace2) {
      
    $sql = "SELECT * FROM  tbl_friend WHERE IdFace1 = '" . $idFace1 . "' AND  IdFace2 = '" . $idFace2 . "'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ';
        exit;
    }
    // Mysql_num_row is counting table row
    if (mysql_num_rows($queryResult) > 0) {
		return  1;
	}
        
    else
        return -1;
}

function insertFriend($idFace1, $idface2) {
     $sql = "INSERT INTO tbl_friend 
                (IdFace1, IdFace2) 
                VALUES ('$idFace1', '$idface2')";              
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
}

?>