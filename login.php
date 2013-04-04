<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<link href="css/popup.css" rel="stylesheet"/>

	<link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
	<script src="scripts/jquery-1.8.3.min.js"></script>
	<script src="scripts/jquery.js"></script>
	<script src="scripts/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
        	// validate signup form on keyup and submit
        	var validator = $("#loginform").validate({
        		rules: {
        			pword: {
        				required: true,
        				minlength: 5
        			},
        			email: {
        				required: true,
        				email: true,
        			}
        		},
        		messages: {
        			pword: {
        				required: "Please enter a password",

        			},
        			email: {
        				required: "Please enter a valid email address",
        			},
        			terms: " "
        		},

        
        		highlight: function(element, errorClass) {
        			$(element).parent().next().find("." + errorClass).removeClass("checked");
        		}
        	});
        
        });
    </script>

</head>
<body>
<div class="popup">
  <?php
        include 'DAO/connection.php';
        include 'DTO/object.php';
        include 'BLL/userBll.php';
        //----------------------------
        
        if(isset($_POST['submit'])) {
            $errors = array();
            if(empty($errors)) {
                $email = mysql_real_escape_string($_POST['email']);
                $pword = mysql_real_escape_string($_POST['pword']);
                
                $result = login($email, $pword);
                echo $result->Email;
                echo $email;
                if($result->Email === $email) {
                    $_SESSION['Id'] = $item->Id;
                    $_SESSION['Email'] = $item->Email;
                    $_SESSION['FullName'] = $item->FullName;
                    $_SESSION['Avatar'] = $item->Avatar;
                    $_SESSION['DOB'] = $item->DOB;
                    $_SESSION['Gender'] = $item->Gender;
                    $_SESSION['FavoriteTeam'] = $item->FavoriteTeam;
                    $_SESSION['Scores'] = $item->Scores;
                    echo 'Login ok';
                } else {
                   echo "The email or password do not match those on file.";
                }
            }
        
        }//End if($_POST['submit'])}
    ?>
    <form action="" method="post" id="loginform">
    	<div class="popup-container">
    		<div class="popup-form">
    			<div class="page-cont-title">
    				<span class="cont-title-bold">Login</span><span class="cont-title-sub">Sub text</span>
    			</div>
    			<div class="page-cont-title-sub">
    				<span class="cont-title-sub"></span>
    				<i class="sub1"></i>
    			</div>
    			<div class="popup-input-row"><span>Email</span><input id="email" type="text" name="email"/></div>
    			<div class="popup-input-row"><span>Password</span><input id="pword" type="password" name="pword"/></div>
    			<div class="popup-btn-row">
    				<a class="popup-btn-forgot" href="#"><i></i>Forgot your password?</a>
                    <a id="cuser" class="popup-btn-forgot" href="#"><i></i>Create acount</a>
    				<a class="popup-btn-login" href="#"><input type="submit" name="submit" value="Login" /></a>
    			</div>
    		</div>
    		<div class="popup-bottom"></div>
    	</div>
    </form>
    
</div>

</body>
</html>
