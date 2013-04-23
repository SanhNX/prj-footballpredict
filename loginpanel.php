<div class="popup undisplayed" id="login-popup">
    <div class="popup-container">
        <div class="popup-form">
            <div class="page-cont-title">
                <span class="cont-title-bold">Login</span><span class="cont-title-sub"></span>
                <span class="popup-btn-close" id="popup-btn-login-close"></span>
            </div>
            <div class="page-cont-title-sub">
                <span class="cont-title-sub"></span>
                <i class="sub1"></i>
            </div>
            <div>
                <?php
                include 'loginfacebook.php';
                ?>
            </div>
            <div class="user-item-avatar-panel default">
				<span class="user-avt default"></span>

			</div>
            <div class="popup-mess-row"><i class="bullet"></i>
                <span> Log in with your email address or </span>
                <a class="popup-link" id="btn-expand-register">create an account.</a>
            </div>
            <form method="post">
                <div class="popup-input-row"><span>Email</span><input id="txtemail" name='txtemail' type="text"/></div>
                <div class="popup-input-row"><span>Password</span><input id="txtpass"  name='txtpass' type="password"/></div>
                <div class="popup-btn-row">
                    <a class="popup-btn-forgot" href="#"><i class="bullet red"></i><span> Forgot your password?</span></a>
                    <input id="btn-login" name='btn-login'  type='submit' class="popup-btn-login" value='Login'/>
                </div>
            </form>
            <span class="login-popup-error-mess"></span>
            <span class="login-loading-spin undisplayed"></span>
        </div>
        <div class="popup-bottom"></div>
    </div>
</div>

<div class="popup undisplayed" id="register-popup">
    <div class="popup-container">
        <div class="popup-form">
            <div class="page-cont-title">
                <span class="cont-title-bold">Register</span><span class="cont-title-sub"></span>
                <span class="popup-btn-close" id="popup-btn-register-close"></span>
            </div>
            <div class="page-cont-title-sub">
                <span class="cont-title-sub"></span>
                <i class="sub0"></i>
            </div>
            <form method="post">
                <span class="popup-error-mess" > </span>
                <div class="popup-input-row"><span>Full Name</span><input id="name" type="text" name="name"/></div>
                <div class="popup-input-row"><span>Email</span><input id="email" type="text" name="email"/></div>
                <div class="popup-input-row"><span>Confirm</span><input id="cemail" type="text" name="cemail"/></div>
                <div class="popup-input-row"><span>Password</span><input id="pass" type="password" name="pass"/></div>
                <div class="popup-input-row"><span>Confirm</span><input id="cpass" type="password" name="cpass"/></div>
                <div class="popup-btn-row">
                    <input id="btn-register" name='btn-register' type='submit' class="popup-btn-login" value='Register'/>
                </div>
            </form>

            <span class="loading-spin undisplayed"></span>
        </div>
        <div class="popup-bottom"></div>
    </div>
</div>

