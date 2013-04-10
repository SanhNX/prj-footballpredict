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
        <script src="scripts/jquery-latest.js"></script>
        <script type="text/javascript" src="scripts/jquery.numeric.js"></script>
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
                            <span class="cont-title-bold">Prediction round 29</span><span class="cont-title-sub">Friday 5 April to Sunday 7 April</span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub">Already played games</span>
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
                                $predictListOfUser = getPredictListOfUser($_SESSION['UserId']);
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
                                echo '<div class = "match-item-num-panel">';
                                echo '<input type="hidden" name="' . $item->Id . '" value="' . $item->Id . '" />';
//                                echo '<script>alert("'.$predictListOfUser[2]->PredictResult.'");</script>';
                                for ($j = 0; $j < count($predictListOfUser); $j++) {
//                                    echo '<script>alert("'.$item->Id.'='.$predictListOfUser[$j]->MatchId.'");</script>';
                                    if ($item->Id == $predictListOfUser[$j]->MatchId) {
                                        $currentPredict = $predictListOfUser[$j]->PredictResult;
                                        break;
                                    }
                                    else
                                        $currentPredict = "-";
                                }
                                $pieces = explode("-", $currentPredict);
                                $predictResultA = $pieces[0];
                                $predictResultB = $pieces[1];

                                echo '<input id="' . $item->Id . '" class="match-item-num-input" value="' . $predictResultA . '" name="clubA' . $item->Id . '" type="number" tabindex="1" maxlength="2" size="2" autocomplete="off" min="0" max="99" pattern="[0-9]*"/>';
                                echo '<input id="' . $item->Id . $item->Id . '" class="match-item-num-input" value="' . $predictResultB . '" name="clubB' . $item->Id . '" type="number" tabindex="1" maxlength="2" size="2" autocomplete="off" min="0" max="99" pattern="[0-9]*"/>';
                                echo '</div>';
                                echo '</li>';
                            }
                            if (isset($_POST['btnSave'])) {
                                if (isset($_SESSION['UserName'])) {
                                    for ($i = 1; $i < 8; $i++) {
                                        if ($i == 7)
                                            echo '<script>alert("Predict Success !!" );</script>';
                                        $tempA = $_POST['clubA' . $i];
                                        $tempB = $_POST['clubB' . $i];
//                                echo '<script>alert("'. $_POST[$i].'---'.$_SESSION['UserId'].'--' .$_POST['clubA'.$i].'--'. $_POST['clubB'.$i].'")</script>';
                                        if ($tempA != "" && $tempB != "") {
                                            $isExist = getPredict_byUIdMId($_SESSION['UserId'], $_POST[$i]);
//                                            echo '<script>alert("Exists : ' . $isExist . ' " );</script>';
                                            if ($isExist == 1) {
                                                updatePredict($_SESSION['UserId'], $_POST[$i], '' . $tempA . '-' . $tempB . '');
                                                echo '<script>location.reload();</script>';
                                            } else {
                                                $predictItem = addPredict($_SESSION['UserId'], $_POST[$i], '' . $tempA . '-' . $tempB . '');
                                                if ($predictItem != -1) {
//                                                echo '<script>alert("INSET SUCCESS . ' . $_POST[$i] . ' " );</script>';
//                                                if ($i == 7)
//                                                    echo '<script>alert("Save your predict success !!" );</script>';
                                                    echo '<script>location.reload();</script>';
                                                } else {
//                                                echo '<script>alert("INSET FAIL . ' . $_POST[$i] . ' " );</script>';
//                                                if ($i == 7)
//                                                    echo '<script>alert("1.Please input valid to predict !!" );</script>';
                                                }
                                            }
                                        } else {
//                                            echo '<script>alert("CONTINUE ' . $_POST[$i] . '" );</script>';
//                                            if ($i == 7)
//                                                echo '<script>alert("2.Please input valid to predict !!" );</script>';
                                            continue;
                                        }
                                    }
                                } else {
                                    echo '<script>alert("Please login to use function");</script>';
                                }
                            }
                            ?>
                            <script type="text/javascript">
                                $("#1").numeric();
                                $("#11").numeric();
                                $("#2").numeric();
                                $("#22").numeric();
                                $("#3").numeric();
                                $("#33").numeric();
                                $("#4").numeric();
                                $("#44").numeric();
                                $("#5").numeric();
                                $("#55").numeric();
                                $("#6").numeric();
                                $("#66").numeric();
                                $("#7").numeric();
                                $("#77").numeric();
                            </script>
                        </ul>

                        <div class="page-cont-control">
                            <div class="page-cont-button" id="page-cont-button-next"></div>  
                            <div class="page-cont-button" id="page-cont-button-prev"></div>  
                            <input class="page-cont-button-save" type="submit" name="btnSave" id="page-cont-button-save" value="Save"/>  
                        </div>
                        <?php
                        echo '</form>';
                        ?>
                    </div>
                    <div class="page-cont-right">
                        <div class="page-cont-title light">
                            <span class="cont-title-bold">Russian Football Championship</span>
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
