<?php
//session_destroy();
session_start();
include 'DAO/connection.php';
include 'BLL/facebookBll.php';
require 'libfacebook/facebook.php';
require 'libfacebook/fbconfig.php';
if(isset($_SESSION['UserName'])){
    unset($_SESSION['UserId']);
    unset($_SESSION['UserName']);
    unset($_SESSION['UserAvatar']);
	
	unset($_SESSION['FlagReload']);
	if (isset($_SESSION['IdFaceBook'])) {
		setcookie('fbs_'.$facebook->getAppId(), '', time()-300, '/', '');
		unset($_SESSION['IdFaceBook']);
		//echo '<script>alert('.$facebook->getAppId().');</script>';
		//$facebook->setSession(NULL);
	}
	
	session_destroy();
}
echo $_SESSION['logout'];
?>