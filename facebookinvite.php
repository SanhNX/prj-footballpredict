<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
   <head>
   <title>My Great Canvas app</title>
   </head>
   <body>
	   <div id="fb-root"></div>
           <script src="scripts/jquery-1.8.3.min.js"></script>
            <script src="scripts/jquery-latest.js"></script>
           <script src="http://connect.facebook.net/en_US/all.js"></script>
	   <script>
			 FB.init({ 
			   appId:'600096946684826', cookie:true, 
			   status:true, xfbml:true 
			 });

			function FacebookInviteFriends()
			{
				var receiverUserIds = FB.ui({ 
                                method : 'apprequests',
                                message: 'Your Welcome http://FoolBallChallenge.me',
								display: 'popup',
								 },
				function(receiverUserIds) {
				var myCars=new Array(); 
				myCars = receiverUserIds.to;
				var str_string = '';
				if (myCars.length > 0) {
					for (var i = 0 ; i < myCars.length ; i++) {
						if (i == (myCars.length-1)) {
							str_string =str_string + myCars[i];
						} else {
							str_string =str_string + myCars[i] + '-';
						}
						console.log("IDS : " + str_string);
					}
					var req = 'id=' + str_string;
					 $.ajax({
						type: "POST",
						url: "./BLL/addfreindBll.php",
						data: req,
						cache: false,
						success: function(dto) {
							setTimeout(function() {
								if (dto === 'success') {
									return false;
								}
								if (dto === 'fail') {
									$("#email").focus();
									$(".login-popup-error-mess").html('<i></i> Email or password is not valid');
									$(".login-loading-spin").addClass("undisplayed");
									return false;
								}
							}, 5000);
						}
					});
					
					
					
				}         
				});
			}
	   </script>
		<a href='#' onclick="FacebookInviteFriends();"> Facebook Invite Friends</a>
	</body>
</html>