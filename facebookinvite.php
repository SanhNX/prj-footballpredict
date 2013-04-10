<html>
   <body>
	   <div id="fb-root"></div>
	   <script src="scripts/libfacebook.js"></script>
	   <script>
			 FB.init({ 
			   appId:'600096946684826', cookie:true, 
			   status:true, xfbml:true 
			 });

			function FacebookInviteFriends()
			{
				var receiverUserIds = FB.ui({ 
										method : 'apprequests',
										message: 'Come on man checkout my applications. visit http://ithinkdiff.net',
								 },
				function(receiverUserIds) {
				var myCars=new Array(); 
				myCars = receiverUserIds.to;
				if (myCars.length > 0) {
					for (var i = 0 ; i < myCars.length ; i++) {
						console.log("IDS : " + receiverUserIds.request + "rhnh" + myCars[i]);
					}
				}         
				});
			}
	   </script>
		<a href='#' style="font-size: 22px; margin: 3px;" onclick="FacebookInviteFriends();"> Facebook Invite Friends</a>
	</body>
</html>