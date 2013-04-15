<?php
session_start();
include 'DAO/connection.php';
include 'BLL/facebookBll.php';
require 'libfacebook/facebook.php';
require 'libfacebook/fbconfig.php';

// Connection...
$user = $facebook->getUser();
if($user) {
	$params = array( 'next' => 'http://www.//footballchallenge.me/' );
	$logoutUrl = $facebook->getLogoutUrl($params);
	
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
		$_SESSION['UserId'] = $_SESSION['IdFaceBook'];
                
		$checkExist = idFaceExist($userdata['id']);
                
		if ($checkExist < 1) {
			
			$resultinsert = insertUserFace($userdata['id'], $userdata['name'], $_SESSION['UserAvatar']);
			if ($resultinsert > 0) {
				$_SESSION['UserId'] = $_SESSION['IdFaceBook'];
			}
		} else {
			$_SESSION['UserId'] = $_SESSION['IdFaceBook'];
		}
		
		$user = null;
                
		//echo '<script> alert('.$logoutUrl.'); </script>';
		if(!isset($_SESSION['FlagReload'])) {
			echo "<script> location.reload(); </script>";
			$_SESSION['FlagReload'] = 1;
		}
		
		
	}
}
else {
	$loginUrl = $facebook->getLoginUrl(array( 'display' => 'popup','scope' => 'email,user_birthday'));
	echo '<a href="'.$loginUrl.'"><img src="images\icon\facebook.png" title="Login with Facebook" /></a>';
}
?>
