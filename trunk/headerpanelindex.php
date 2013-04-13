<div class="header">
    <div class="header-container">
       <div class="header-logo"><span class="" style="color: red;"> FOOTBALL </span><br/><span class="" style="color: white;"> Challenge</span>
		</div>
        <div class="header-log">
            <?php
            if (!isset($_SESSION["UserName"]))
                echo '<div class = "btn-expand-login" id = "expand-login-btn">Login</div>';
            else {
                echo '<div class = "lbl-profile" id = "profile-label">';
                echo '<span class="user-name">';
                echo $_SESSION["UserName"];
                echo '</span>';
                echo '<span class="user-avt" style="background-image: url(' . $_SESSION["UserAvatar"] . ')"></span>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>