<?php
//session_destroy();
session_start();
include 'DAO/connection.php';
if(isset($_SESSION['UserName'])){
    unset($_SESSION['UserId']);
    unset($_SESSION['UserName']);
    unset($_SESSION['UserAvatar']);
	unset($_SESSION['IdFaceBook']);
	unset($_SESSION['FlagReload']);
	session_destroy();
}
echo $_SESSION['logout'];
?>