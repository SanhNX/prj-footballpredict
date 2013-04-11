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
                        
                            <?php
                            include 'DAO/connection.php';
                            include 'DTO/object.php';
                            include 'BLL/predictBll.php';
                            // ---------------------------------

                            $tourIndex = 23;

                            $itemList = getMatchListOfLeagues(1, $tourIndex);
                            echo '<div class="page-cont-title">
                                    <span class="cont-title-bold">Prediction tour '.$tourIndex.'</span><span class="cont-title-sub">'.date_format(date_create($itemList[0]->StartTime), 'l d F').' to '.date_format(date_create($itemList[7]->StartTime), 'l d F').'</span>
                                </div>';
                            
                            
                            
                            echo '<form method="POST">';
                            for ($i = 0; $i < count($itemList); $i++) {
                                $item = $itemList[$i];
//                                $startTime = date_format(date_create($item->StartTime), 'l, d F Y h:i');
                                if($i == 0 || date_format(date_create($itemList[$i - 1]->StartTime), 'd F Y , l') != date_format(date_create($itemList[$i]->StartTime), 'd F Y , l')){
                                    echo '<div class="page-cont-title-sub">
                                        <span class="cont-title-sub">'.date_format(date_create($item->StartTime), 'd F Y , l').'</span>
                                        <i class="sub0"></i>
                                    </div>
                                    <ul class="match-list">';
                                }
                                $startTime = date_format(date_create($item->StartTime), 'l, d F Y h:i');
                                $clubA = getClub_byId($item->ClubA);
                                $clubB = getClub_byId($item->ClubB);
                                $pieces = explode("-", $item->Result);
                                $predictResultA = $pieces[0];
                                $predictResultB = $pieces[1];
//                                echo '<script>alert("'.$clubA->Logo.'");</script>';
                                echo '<li class = "match-item">';
                                echo '<div class="start-time">'.date_format(date_create($item->StartTime), 'H : i').'</div>';
                                echo '<div class = "match-item-icon-panel">';
                                echo '<img src = "' . $clubA->Logo . '"/><img src = "' . $clubB->Logo . '"/>';
                                echo '</div>';
                                echo '<div class = "match-item-name-panel">';
                                echo '<span class = "match-item-name">';
                                echo '<span class = "match-item-cap">' . $clubA->Name . ' - ' . $clubB->Name . '</span><br>';
//                                echo '<span class = "match-item-sub">' . $startTime . '</span>';
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
                    <?php
                    include 'rightpanel.php';
                    ?>
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
