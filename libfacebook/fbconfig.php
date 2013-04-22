<?php
//Facebook Application Configuration.
$facebook_appid='600096946684826';
$facebook_app_secret='3ecd8bd12406b69ab1b2cec2af44ecf6';

$facebook = new Facebook(array(
'appId'  => $facebook_appid,
'secret' => $facebook_app_secret,
'cookie' => false,
));


?>