<?php
session_start();
include 'DAO/connection.php';
include 'BLL/facebookBll.php';
require 'libfacebook/facebook.php';
require 'libfacebook/fbconfig.php';

// Connection...
$user = $facebook->getUser();
if (!empty($_SESSION['UserId'])) {
	$user = null;
}
if ($user) {
	$logoutUrl = $facebook->getLogoutUrl();
	
	try {
		$userdata = $facebook->api('/me');
	} catch (FacebookApiException $e) {
		$user = null;
	}
	
	$_SESSION['facebook']=$_SESSION;
	$_SESSION['userdata'] = $userdata;
	$_SESSION['logout'] =  $logoutUrl;



	$facebook = $_SESSION['facebook'];
	$userdata = $_SESSION['userdata'];
	$logoutUrl = $_SESSION['logout'];
	$access_token_title = 'fb_'.$facebook_appid.'_access_token';
	$access_token = $facebook[$access_token_title];


	if(!empty($userdata)) {
		$_SESSION['UserName'] = $userdata['name'];
		$_SESSION['IdFaceBook'] = $userdata['id'];
		$_SESSION['UserAvatar'] = "https://graph.facebook.com/".$userdata['id']."/picture";
                
		$checkExist = idFaceExist($userdata['id']);
                
		if ($checkExist < 1) {
			
			$resultinsert = insertUserFace($userdata['id']);
			if ($resultinsert > 0) {
				$_SESSION['UserId'] = $resultinsert;
			}
		} else {
			$_SESSION['UserId'] = $checkExist;
		}
		
		$user = null;
                
		//echo '<script> alert('.$logoutUrl.'); </script>';
		echo "<script> window.location='result.php'; </script>";
	}
}
else {
	$loginUrl = $facebook->getLoginUrl(array( 'display' => 'popup','scope' => 'email,user_birthday'));
	echo '<a href="'.$loginUrl.'"><img src="images\icon\facebook.png" title="Login with Facebook" /></a>';
}
?>
