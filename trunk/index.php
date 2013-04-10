<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet"/>
        <link href="css/menu.css" rel="stylesheet"/>

        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script src="scripts/jquery-1.8.3.min.js"></script>
        <script src="scripts/jquery-latest.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/ajax-vaildate.js"></script>
        
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="main">
            <?php
            include 'headerpanel.php';
            ?>
            <div class="cover home">
                <div class="cover-container home">
                </div>
                <div class="cover-container-bottom">
                    <p>Choose your competition</p>
                    <span>Challenge your friends in one or more competitions!</span>
                </div>
            </div>
            <div class="page">
                <div class="page-container">
                    <div class="page-cont-left home">


                        <div class="page-home-frame">
                            <div class="page-home-frame-item title"><span>Previous competitions on LetsPredict.it</span></div>
                            <div class="page-home-frame-item link">
                                <img src="images\resources\team-logo\RussianPremierLeague01.gif">
                                <span><b>Russian Football Championship 2012-2013</b>
                                    500.000 participants</span></div>
                            <div class="page-home-frame-item link">
                                <img src="http://letspredict.it/static/versioned-images/img/landing-page/eurocup-logo-home.c0b4ae6c.png">
                                <span><b>Euro2012</b>
                                    240.000 participants</span></div>
                        </div>
                        <div class="page-home-row">
                            <div class="page-home-row-item">
                                <span><b>Russian Football Championship</b>
                                    Predict the matches between Ajax, AZ, PSV and the Eredivisie-new-entrant PEC Zwolle!</span>

                                <div class="page-home-row-btn">Predict Russian Football</div>
                            </div>
                            <div class="page-home-row-item">
                                <span><b>Top League</b>
                                    Predict the matches of top teams (such as Manchester United and Barcelona) in English, Italian, Spanish and German leagues.</span>

                                <div class="page-home-row-btn">Predict Top League</div>
                            </div>
                            <div class="page-home-row-item">
                                <span><b>Champions League</b>
                                    Alongside of the Dutch football leagues, you can also predict for the Champions League.</span>

                                <div class="page-home-row-btn">Predict Champions League</div>
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
