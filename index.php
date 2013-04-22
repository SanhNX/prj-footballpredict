<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- no cache headers -->
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<!-- end no cache headers -->
        <title></title>
        <!--[if !IE]><!-->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!--<![endif]-->
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css"href="css/style-ie8.css" />
        <![endif]-->
        <link href="css/menu.css" rel="stylesheet"/>

        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script src="scripts/jquery-1.8.3.min.js"></script>
        <script src="scripts/jquery-latest.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/ajax-vaildate.js"></script>
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40311434-1', 'footballchallenge.me');
		  ga('send', 'pageview');

		</script>

    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="main">
            <?php
            include 'headerpanelindex.php';
            ?>
            <div class="cover home">
                <div class="cover-container-bottom">
                    <p>Choose your competition</p>
                    <span>Challenge your friends in one or more competitions!</span>
                </div>
            </div>
            <div class="page">
                <div class="page-container">
                    <div class="page-cont-left home">


                        <div class="page-home-frame">
                            <div class="page-home-frame-item title"><span>New Leagues Coming Soon Footballchallenge.me</span></div>
                            <div class="page-home-frame-item link">
                                <img src="images\resources\team-logo\RussianPremierLeague01.gif">
                                <span><b></b>
                                    </span></div>
                            <div class="page-home-frame-item link">
                                <img src="http://letspredict.it/static/versioned-images/img/landing-page/eurocup-logo-home.c0b4ae6c.png">
                                <span><b></b>
                                    </span></div>
                        </div>
                        <div class="page-home-row">
                            <div class="page-home-row-item">
                                <span><b>Russian Football Championship</b>
                                    Predict the matches between CSKA, Zenit, Anzhi....</span>

                                <div><a class="page-home-row-btn" href="predict.php">Predict Russian Football</a></div>
                            </div>
                            <div class="page-home-row-item">
                                <span><b></b>
                                    </span>

                                <div class="page-home-row-btn">Coming Soon</div>
                            </div>
                            <div class="page-home-row-item">
                                <span><b></b>
								</span>

                                <div class="page-home-row-btn">Coming Soon</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-clear"></div>
            </div>

        </div>
        <?php
            include 'footerpanel.php';
            ?>
        </div>
        <?php
        include 'loginpanel.php';
        ?>
</body>
</html>
