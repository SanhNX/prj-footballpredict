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
                        <form method="POST">
                            <?php
                            include 'DAO/connection.php';
                            include 'DTO/object.php';
                            include 'BLL/predictBll.php';
                            // ---------------------------------
                            $tourIndex = isset($_REQUEST['tourIndex']) ? $_REQUEST['tourIndex'] : 25;

                            $itemList = getMatchListOfLeagues(1, $tourIndex);



                            if (count($itemList) == 0) {
                                echo '<div class="page-cont-title">
                                    <span class="cont-title-bold">Prediction tour ' . $tourIndex . '</span>
                                    
                                </div>';
                                echo '<div class="no-match-list"><i></i>  This round had finished !!</div>';
                            } else {
                                echo '<div class="page-cont-title">
                                    <span class="cont-title-bold">Prediction tour ' . $tourIndex . '</span>
                                    <span class="cont-title-sub">' . date_format(date_create($itemList[0]->StartTime), 'l d F') . ' to ' . date_format(date_create($itemList[7]->StartTime), 'l d F') . '</span>
                                        </div>';
                                echo '<ul class="match-list">';
                                for ($i = 0; $i < count($itemList); $i++) {
                                    $item = $itemList[$i];
//                                $startTime = date_format(date_create($item->StartTime), 'l, d F Y h:i');
                                    if ($i == 0)
                                        $start = $item->Id;
                                    if ($i == count($itemList) - 1)
                                        $end = $item->Id;
                                    if ($i == 0 || date_format(date_create($itemList[$i - 1]->StartTime), 'd F Y , l') != date_format(date_create($itemList[$i]->StartTime), 'd F Y , l')) {
                                        echo '<div class="page-cont-title-sub">
                                        <span class="cont-title-sub">' . date_format(date_create($item->StartTime), 'd F Y , l') . '</span>
                                        <i class="sub0"></i>
                                    </div>';
                                    }

                                    $startTime = date_format(date_create($item->StartTime), 'd F Y , l');
                                    $clubA = getClub_byId($item->ClubA);
                                    $clubB = getClub_byId($item->ClubB);
                                    $predictListOfUser = getPredictListOfUser($_SESSION['UserId']);
//                                echo '<script>alert("'.$clubA->Logo.'");</script>';
//                                $now = getdate();
////                                $currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
//                                $itemDate = date_format(date_create($item->StartTime), 'Y-F-d');
//                                $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
//                                $now = date_format(date_create(getdate()), 'd F Y , l');
//                                if (strtotime($itemDate) > strtotime($currentDate)) {//neu ngay hien tai lon hon ngay so sanh
//                                    echo '<script>alert(">");</script>';
//                                } else {
//                                    echo '<script>alert("<");</script>';
//                                }

                                    echo '<li class = "match-item">';
                                    echo '<div class="start-time">' . date_format(date_create($item->StartTime), 'H : i') . '</div>';
                                    echo '<div class = "match-item-icon-panel">';
                                    echo '<img src = "' . $clubA->Logo . '"/><img src = "' . $clubB->Logo . '"/>';
                                    echo '</div>';
                                    echo '<div class = "match-item-name-panel">';
                                    echo '<span class = "match-item-name">';
                                    echo '<span class = "match-item-cap">' . $clubA->Name . ' - ' . $clubB->Name . '</span><br>';
//                                echo '<span class = "match-item-sub">' . $startTime . '</span>';
                                    echo '</span>';
                                    echo '</div>';
                                    echo '<div class = "match-item-num-panel">';
                                    echo '<input type="hidden" name="' . $item->Id . '" value="' . $item->Id . '" class="hidden"/>';
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
                            }
                            if (isset($_POST['btnSave'])) {
                                if (isset($_SESSION['UserName'])) {
//                                    echo '<script>alert("Start : ' . $start . ' End : '.$end.' " );</script>';
                                    for ($preIndex = $start; $preIndex <= $end; $preIndex++) {
//                                        echo '<script>alert("preIndex : ' . $preIndex . '" );</script>';
                                        if ($preIndex == $end)
                                            echo '<script>alert("Predict Success !!" );</script>';
                                        $tempA = $_POST['clubA' . $preIndex];
                                        $tempB = $_POST['clubB' . $preIndex];
//                                        echo '<script>alert("'. $_POST[$preIndex].'---'.$_SESSION['UserId'].'--' .$_POST['clubA'.$preIndex].'--'. $_POST['clubB'.$preIndex].'")</script>';
                                        if ($tempA != "" && $tempB != "") {
                                            $isExist = getPredict_byUIdMId($_SESSION['UserId'], $_POST[$preIndex]);
//                                            echo '<script>alert("Exists : ' . $isExist . ' " );</script>';
                                            if ($isExist == 1) {
                                                updatePredict($_SESSION['UserId'], $_POST[$preIndex], '' . $tempA . '-' . $tempB . '');
                                                echo '<script>location.reload();</script>';
                                            } else {
                                                $predictItem = addPredict($_SESSION['UserId'], $_POST[$preIndex], '' . $tempA . '-' . $tempB . '');
                                                if ($predictItem != -1) {
//                                                echo '<script>alert("INSET SUCCESS . ' . $_POST[$preIndex] . ' " );</script>';
//                                                if ($i == 7)
//                                                    echo '<script>alert("Save your predict success !!" );</script>';
                                                    echo '<script>location.reload();</script>';
                                                } else {
//                                                echo '<script>alert("INSET FAIL . ' . $_POST[$preIndex] . ' " );</script>';
//                                                if ($i == 7)
//                                                    echo '<script>alert("1.Please input valid to predict !!" );</script>';
                                                }
                                            }
                                        } else {
//                                            echo '<script>alert("CONTINUE ' . $_POST[$preIndex] . '" );</script>';
//                                            if ($i == 7)
//                                                echo '<script>alert("2.Please input valid to predict !!" );</script>';
                                            continue;
                                        }
                                    }
                                } else {
                                    echo '<script>alert("Please login to use function");</script>';
                                }
                            } else if (isset($_POST['btnNext'])) {
                                if ($tourIndex < 30)
                                    $tourIndex++;
                                echo '<script>window.location = "predict.php?tourIndex=' . $tourIndex . '";</script>';
                            }else if (isset($_POST['btnPrevious'])) {
                                if ($tourIndex >= 24)
                                    $tourIndex--;
                                echo '<script>window.location = "predict.php?tourIndex=' . $tourIndex . '";</script>';
                            }
                            echo '</ul>';
                            ?>
                            <script type="text/javascript">
                                for (var i = 0; i < 16; i++) {
                                    var id = $(".match-item-num-input")[i].id;
                                    $('#' + id).numeric();
                                }
                            </script>

                            <div class="page-cont-control">
                                <input class="page-cont-button" type="submit" id="page-cont-button-next" name="btnPrevious" value=""></input>  
                                <input class="page-cont-button" type="submit" id="page-cont-button-prev" name="btnNext" value=""></input>  
                                <input class="page-cont-button-save" type="submit" name="btnSave" id="page-cont-button-save" value="Save"/>  
                            </div>
                        </form>
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
