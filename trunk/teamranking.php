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
        <script src="scripts/main.js"></script>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="header-container">
                    <div class="header-menu">
                        <ul class="menu-list">
                            <li class="menu-item"><a href="predict.php" id="menu-item1">Prediction</a></li>
                            <li class="menu-item"><a href="result.php" id="menu-item2">Result</a></li>
                            <li class="menu-item"><a href="pool.php" id="menu-item3">Poules</a></li>
                            <li class="menu-item"><a href="userranking.php" id="menu-item4">Ranking</a></li>
                            <li class="menu-item"><a href="teamranking.php" id="menu-item5">Team Ranking</a></li>
                        </ul>
                    </div>
                    <div class="header-logo">LOGO</div>
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
            <div class="cover">
                <div class="cover-container">
                </div>

            </div>
            <div class="page">
                <div class="page-container">
                    <div class="page-cont-left">
                        <div class="page-cont-title">
                            <span class="cont-title-bold">Text</span><span class="cont-title-sub">Sub text</span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub">Sub text</span>
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
                            <div class="page-cont-button" id="page-cont-button-next"></div>
                            <div class="page-cont-button" id="page-cont-button-prev"></div>
                            <!--<div class="page-cont-button-save" id="page-cont-button-save">Save</div>-->
                        </div>
                    </div>
                    <div class="page-cont-right">
                        <div class="page-cont-title light">
                            <span class="cont-title-bold">Eredivisie</span>
                        </div>
                        <div class="page-cont-rate">
                            <p class="page-cont-label">115,098 participants</p>

                            <p class="page-cont-label">5,981,178 predictions</p>
                        </div>
                        <ul class="page-cont-tip-list">
                            <li class="page-cont-tip-item">
                                <div class="page-cont-tip-icon"><i class="tip-num">1</i></div>
                                <div class="page-cont-tip-info">
                                    <div class="page-cont-tip-title">Enter your predictions</div>
                                    <div class="page-cont-tip-des">You will score points when you predict the correct winner, or
                                        the exact score of one or both teams
                                    </div>
                                </div>
                            </li>
                            <li class="page-cont-tip-item">
                                <div class="page-cont-tip-icon"><i class="tip-num">2</i></div>
                                <div class="page-cont-tip-info">
                                    <div class="page-cont-tip-title">Enter your predictions</div>
                                    <div class="page-cont-tip-des">You will score points when you predict the correct winner, or
                                        the exact score of one or both teams
                                    </div>
                                </div>
                            </li>
                            <li class="page-cont-tip-item">
                                <div class="page-cont-tip-icon"><i class="tip-num">3</i></div>
                                <div class="page-cont-tip-info">
                                    <div class="page-cont-tip-title">Enter your predictions</div>
                                    <div class="page-cont-tip-des">You will score points when you predict the correct winner, or
                                        the exact score of one or both teams
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="page-cont-ref"></div>
                    </div>
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
