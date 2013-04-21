<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
    </head>
    <body>
        <div class="main">
            <?php
            include 'headerpanel.php';
            ?>
            <div class="cover">
                <div class="cover-container">
                </div>

            </div>
            <div class="page">
                <div class="page-container">
                    <div class="page-cont-left">
                        <div class="page-cont-title">
                            <span class="cont-title-bold">Ranking Club</span><span class="cont-title-sub"></span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub"></span>
                            <i class="sub0"></i>
                        </div>
                        <div class="team-list-head">
                            
                            <div class="team-list-head-item">Points</div>
                            <div class="team-list-head-item">Lost</div>
                            <div class="team-list-head-item">Won</div>
                            <div class="team-list-head-item">Played</div>
                        </div>
                        <ul class="team-list">
                            <?php
                            include 'DAO/connection.php';
                            include 'DTO/object.php';
                            include 'BLL/rankingBll.php';
                            // ---------------------------------


                            $itemList = getRankingDESC();
                            for ($i = 0; $i < count($itemList); $i++) {
                                $item = $itemList[$i];
                                if(!$item->Played)
                                    continue;
                                echo '<li class="team-item">
                                    <div class="team-item-rank">' . ($i + 1) . '</div>
                                    <div class="team-item-icon-panel">
                                        <img src="' . $item->Logo . '"/>
                                    </div>
                                    <span class="team-item-name">'. $item->Name .'</span>
                                        
                                    <div class="team-item-score">'. $item->Points .'</div>
                                    <div class="team-item-score">'. $item->Lost .'</div>
                                    <div class="team-item-score">'. $item->Won .'</div>
                                    <div class="team-item-score">'. $item->Played .'</div>
                                    </li>';
                            }
                            ?>

                        </ul>
                        <div class="page-cont-control">
                            <!--<div class="page-cont-button" id="page-cont-button-next"></div>-->
                            <!--<div class="page-cont-button" id="page-cont-button-prev"></div>-->
                            <!--<div class="page-cont-button-save" id="page-cont-button-save">Save</div>-->
                        </div>
                    </div>
                    <?php
                    include 'rightpanel.php';
                    ?>
                    <div class="page-clear"></div>
                </div>

            </div>
            <div class="footer">
                <?php
            include 'footerpanel.php';
            ?>
        </div>
        <?php
        include 'loginpanel.php';
        ?>
    </body>
</html>
