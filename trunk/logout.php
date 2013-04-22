<?php
//session_destroy();
session_start();
include 'DAO/connection.php';
include 'BLL/facebookBll.php';
require 'libfacebook/facebook.php';
require 'libfacebook/fbconfig.php';
$saveLogout = $_SESSION['logout'];
if(isset($_SESSION['UserName'])){
	$_SESSION = array();
    unset($_SESSION['UserId']);
    unset($_SESSION['UserName']);
    unset($_SESSION['UserAvatar']);
	
	unset($_SESSION['FlagReload']);
	if (isset($_SESSION['IdFaceBook'])) {
		setcookie('fbs_'.$facebook->getAppId(), '', time()-300, '/', '');
		setcookie(session_name(),time()-42000,'/',0,0);
		unset($_SESSION['IdFaceBook']);
		$facebook->destroySession();
		//echo '<script>alert('.$facebook->getAppId().');</script>';
		//$facebook->setSession(NULL);
	}
	clearstatcache();
	session_destroy();
}
echo $saveLogout;
?>