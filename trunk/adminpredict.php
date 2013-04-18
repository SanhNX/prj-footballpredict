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
                            <span class="cont-title-bold">Admin Predict</span><span class="cont-title-sub"></span>
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
                            include 'BLL/matchlistBll.php';
                            include 'BLL/countpointBll.php';
                            // ---------------------------------


                            $itemList = getAdminMatchList(1);
                            echo '<form method="POST">';
                            for ($i = 0; $i < count($itemList); $i++) {
                                $item = $itemList[$i];
                                $startTime = date_format(date_create($item->StartTime), 'l, d F Y h:i');
                                $clubA = getClub_byId($item->ClubA);
                                $clubB = getClub_byId($item->ClubB);
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
								echo '<input type="hidden" name="idA' . $i . '" value="' . $item->ClubA . '" />';
								echo '<input type="hidden" name="idB' . $i . '" value="' . $item->ClubB . '" />';
                                echo '<input id="' . $item->Id . '" class="match-item-num-input" name="clubA' . $item->Id . '" type="number" tabindex="1" maxlength="2" size="2" autocomplete="off" min="0" max="99" pattern="[0-9]*"/>';
                                echo '<input id="' . $item->Id . $item->Id . '" class="match-item-num-input" name="clubB' . $item->Id . '" type="number" tabindex="1" maxlength="2" size="2" autocomplete="off" min="0" max="99" pattern="[0-9]*"/>';
                                echo '</div>';
                                echo '</li>';
                            }
                            if (isset($_POST['btnSave'])) {
                                for ($i = 0; $i < 40; $i++) {


                                    $resultA = $_POST['clubA' . $i];
                                    $resultB = $_POST['clubB' . $i];
									
									$idClubA = $_POST['idA' . $i];
									$idClubB = $_POST['idB' . $i];
                                    

                                    if ($i == 19) {
										 echo '<script>alert("You are save Success !!" );</script>';
										echo '<script>location.reload();</script>';
									}
                                       
//                                echo '<script>alert("'. $_POST[$i].'---'.$_SESSION['UserId'].'--' .$_POST['clubA'.$i].'--'. $_POST['clubB'.$i].'")</script>';


                                    if ($resultA >= 0 && $resultB >= 0 && $resultA != "" && $resultB != "") {
//                                        echo '<script>alert("UPDATE FAIL . ' . $resultA . '-' . $resultB . ' " );</script>';
                                        $predictItem = updateResult($_POST[$i], '' . $resultA . '-' . $resultB . '');
										echo '<script>alert("'. $predictItem .'")</script>';
                                        if ($predictItem != -1) {
											// update point user
                                            countPoint($_POST[$i], $_POST['clubA' . $i], $_POST['clubB' . $i]);
											// update point club
											pointClub($idClubA, $idClubB, $resultA, $resultB);
                                        } else {
                                            //echo '<script>alert("UPDATE FAIL . '. $_POST[$i] .' " );</script>';
                                        }
                                    } else {
                                        //echo '<script>alert("CONTINUE '. $_POST[$i] .'" );</script>';
                                        continue;
                                    }
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
                            <?php
                            include 'BLL/userBll.php';

                            echo '<p class="page-cont-label">' . countParticipants() . ' participants</p>';
                            echo '<p class="page-cont-label">' . countPredictions() . ' predictions</p>';
                            ?>
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
                                    <div class="page-cont-tip-title">Save your prediction</div>
                                    <div class="page-cont-tip-des">Save your prediction by logging in with your Facebook or Twitter account, or by email address
                                    </div>
                                </div>
                            </li>
                            <li class="page-cont-tip-item">
                                <div class="page-cont-tip-icon"><i class="tip-num">3</i></div>
                                <div class="page-cont-tip-info">
                                    <div class="page-cont-tip-title">Challenge and follow!</div>
                                    <div class="page-cont-tip-des">Invite your friends, create pools and compete with each other during this Eredivisie season!
                                    </div>
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
