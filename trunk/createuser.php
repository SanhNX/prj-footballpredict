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
                $name = mysql_real_escape_string($_POST['name']);
                $email = mysql_real_escape_string($_POST['email']);
                $pword = mysql_real_escape_string($_POST['pword']);
                $avatar = "images/resources/team-logo/Alania.jpg";
                $bod = mysql_real_escape_string($_POST['bod']);
                $gender = mysql_real_escape_string($_POST['sex']);
                
                if($gender === male ) {
                    $gender = 1;
                } else {
                    $gender = 0;
                }
                $emailExist = emailExist($email);
                if($emailExist == 1) {
                    $errors[] = "Email ecist.";
                }
                
                if(empty($errors)) {
                    $result = insertUser ($name, $email, $pword, $bod, $gender, $avatar);
                    if($result > 0) {
                        $_SESSION['Id'] = $result;
                        $_SESSION['Email'] = $email;
                        $_SESSION['FullName'] = $name;
                        $_SESSION['Avatar'] = $avatar;
                        $_SESSION['DOB'] = $bod;
                        $_SESSION['Gender'] = $gender;
                        $_SESSION['Scores'] = 0;
                        $errors[] = "Create user ok";
                    } else {
                        $errors[] = "Can not create user.";
                    }
                }
               
            }
        
        }//End if($_POST['submit'])}
    ?>
    
    <form action="" method="post" id="loginform">
        <?php if(!empty($errors)) {
                echo "<ul>";
                foreach($errors as $error) {
                    echo "<li>{$error}</li>";
                }
                echo "</ul>";
            }
        ?>
    	<div class="popup-container">
    		<div class="popup-form">
    			<div class="page-cont-title">
    				<span class="cont-title-bold">Login</span><span class="cont-title-sub">Sub text</span>
    			</div>
    			<div class="page-cont-title-sub">
    				<span class="cont-title-sub"></span>
    				<i class="sub1"></i>
    			</div>
                <div class="popup-input-row"><span>Name</span><input id="name" type="text" name="name"/></div>
    			<div class="popup-input-row"><span>Email</span><input id="email" type="text" name="email"/></div>
                <div class="popup-input-row"><span>Confirm Email</span><input id="cemail" type="text" name="cemail"/></div>
    			<div class="popup-input-row"><span>Password</span><input id="pword" type="password" name="pword"/></div>
                <div class="popup-input-row"><span>Confirm Password</span><input id="cpword" type="password" name="cpword"/></div>
                <div class="popup-input-row"><span>BOD</span><input id="bod" type="text" name="bod"/></div>
                <div class="popup-input-row"><span>Gender</span><input type="radio" name="sex" value="male"/>Male<input type="radio" name="sex" value="female"/>Female</div>
                
                
                
     
    			<div class="popup-btn-row">
    				<a class="popup-btn-forgot" href="#"><i></i>Forgot your password?</a>
    				<a class="popup-btn-login" href="#"><input type="submit" name="submit" value="Create" /></a>
    			</div>
    		</div>
    		<div class="popup-bottom"></div>
    	</div>
    </form>
    
</div>

</body>
</html>
