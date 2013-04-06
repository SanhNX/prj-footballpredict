<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/menu.css" rel="stylesheet" />

        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script src="scripts/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="scripts/jquery.numeric.js"></script>
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
                            <span class="cont-title-bold">Result round 28</span><span class="cont-title-sub">Saturday 30 March to Sunday 31 March</span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub"></span>
                            <i class="sub0"></i>
                        </div>
                        <ul class="match-list">
                            <?php
                            include 'DAO/connection.php';
                            include 'DTO/object.php';
                            include 'BLL/predictBll.php';
                            // ---------------------------------


                            $itemList = getMatchListOfLeagues(1);
                            echo '<form method="POST">';
                            for ($i = 0; $i < count($itemList); $i++) {
                                $item = $itemList[$i];
                                $startTime = date_format(date_create($item->StartTime), 'l, d F Y h:i');
                                $clubA = getClub_byId($item->ClubA);
                                $clubB = getClub_byId($item->ClubB);
                                $pieces = explode("-", $item->Result);
                                $predictResultA = $pieces[0];
                                $predictResultB = $pieces[1];
//                                echo '<script>alert("'.$clubA->Logo.'");</script>';
                                echo '<li class = "match-item">';
                                echo '<div class = "match-item-icon-panel">';
                                echo '<img src = "' . $clubA->Logo . '"/><img src = "' . $clubB->Logo . '"/>';
                                echo '</div>';
                                echo '<div class = "match-item-name-panel">';
                                echo '<span class = "match-item-name">';
                                echo '<span class = "match-item-cap">' . $clubA->Name . ' - ' . $clubB->Name . '</span><br>';
                                echo '<span class = "match-item-sub">' . $startTime . '</span>';
                                echo '</span>';
                                echo '</div>';
                                if($item->Result == ""){
                                    echo '<div class="match-item-mess-panel">';
                                    echo '<span class="match-item-mess">awaiting outcome...</span>';
                                    echo '</div>';
                                }
                                echo '<div class = "match-item-num-panel">';
                                echo '<input type="hidden" name="' . $item->Id . '" value="' . $item->Id . '" />';
                                echo '<span class="match-item-num-input" >' . $predictResultA . '</span>';
                                echo '<span class="match-item-num-input" >' . $predictResultB . '</span>';
                                echo '</div>';
                                echo '</li>';
                            }
                            if (isset($_POST['btnSave'])) {
                                for ($i = 1; $i < 8; $i++) {

//                                echo '<script>alert("'. $_POST[$i].'---'.$_SESSION['UserId'].'--' .$_POST['clubA'.$i].'--'. $_POST['clubB'.$i].'")</script>';
                                    if ($_POST['clubA' . $i] && $_POST['clubB' . $i]) {
                                        $predictItem = addPredict($_SESSION['UserId'], $_POST[$i], '' . $_POST['clubA' . $i] . '-' . $_POST['clubB' . $i] . '');
                                        if ($predictItem != -1) {
//                                            echo '<script>alert("INSET SUCCESS . '. $_POST[$i] .' " );</script>';
                                            if ($i == 7)
                                                echo '<script>alert("Predict Success !!" );</script>';
                                        } else {
//                                            echo '<script>alert("INSET FAIL . '. $_POST[$i] .' " );</script>';
                                            if ($i == 7)
                                                echo '<script>alert("Please input valid to predict !!" );</script>';
                                        }
                                    } else {
//                                        echo '<script>alert("CONTINUE '. $_POST[$i] .'" );</script>';
                                        if ($i == 7)
                                            echo '<script>alert("Please input valid to predict !!" );</script>';
                                        continue;
                                    }
                                }
                            }
                            ?>
                        </ul>

                        <div class="page-cont-control">
                            <div class="page-cont-button" id="page-cont-button-next"></div>  
                            <div class="page-cont-button" id="page-cont-button-prev"></div>  
                            <!--<input class="page-cont-button-save" type="submit" name="btnSave" id="page-cont-button-save" value="Save"/>-->  
                        </div>
                        <?php
                        echo '</form>';
                        ?>
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
                                    <div class="page-cont-tip-des">You will score points when you predict the correct winner, or the exact score of one or both teams</div>
                                </div>
                            </li>
                            <li class="page-cont-tip-item">
                                <div class="page-cont-tip-icon"><i class="tip-num">2</i></div>
                                <div class="page-cont-tip-info">
                                    <div class="page-cont-tip-title">Enter your predictions</div>
                                    <div class="page-cont-tip-des">You will score points when you predict the correct winner, or the exact score of one or both teams</div>
                                </div>
                            </li>
                            <li class="page-cont-tip-item">
                                <div class="page-cont-tip-icon"><i class="tip-num">3</i></div>
                                <div class="page-cont-tip-info">
                                    <div class="page-cont-tip-title">Enter your predictions</div>
                                    <div class="page-cont-tip-des">You will score points when you predict the correct winner, or the exact score of one or both teams</div>
                                </div>
                            </li>
                        </ul>
                        <div class="page-cont-ref"></div>
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
