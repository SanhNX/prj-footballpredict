<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet"/>
        <link href="css/gridview.css" rel="stylesheet"/>
        <link href="css/menu.css" rel="stylesheet"/>
        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script src="scripts/jquery-1.8.3.min.js"></script>
        <script src="scripts/jquery-latest.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/ajax-vaildate.js"></script>
        <script src="scripts/ajax-search.js"></script>
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
                        include 'BLL/poolBll.php';
                        include 'BLL/predictBll.php';
                        // ---------------------------------
                        
                        if (isset($_REQUEST['clubId'])) {
                            $item = getClub_byId($_REQUEST['clubId']);
                            echo '<div class="page-cont-title">
                                <span class="cont-title-bold">'.$item->Name.'</span><span class="cont-title-sub"></span>
                            </div>';
                            echo '<div class="page-cont-title-sub">
                                    <span class="cont-title-sub">Detail of groups</span>
                                    <i class="sub0"></i>
                                </div>
                                <div class="grid-wrapper-your-group">
                                    <ul class="grid-your-group">';
                            
                            echo '<li class = "item">';
                            echo '<div class = "grid-icon-panel">';
                            echo '<img src = "' . $item->Logo . '"/>';
                            echo '</div>';
                            echo '<div class = "grid-item-cap">' . $item->Name . '</div>';
                            echo '<div class = "grid-item-mess">' . $item->CreateBy . '</div>';
                            echo '<a class = "grid-item-button-your-group" onclick="leavegroup('.$_REQUEST['clubId'].', '.$_SESSION['UserId'].')">Leave this group</a>';
                            echo '</li>';
                            echo '</ul><span class="detail-group-error"></span><div class="right-content"><div class="group-details">
                                    <p><span class="group-details-label">by</span>
                                        <a href="#">' . $item->CreateBy . '</a>
                                    </p>
                                    <p>
                                        <span class="group-details-label">Type </span>
                                        Public pool, everybody can join
                                    </p>
                                    <p>
                                        <span class="group-details-label">Members </span>
                                        <span class="pool-members-count">' . count(getUsersOfGroup($_REQUEST['clubId'])) . '</span>
                                    </p>
                                    <p class="group-description"> </p>
                                </div></div></div>';
                        }
                        ?>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub">Member List</span>
                            <i class="sub0"></i>
                        </div>

                        <ul class="user-list">
                            <?php
                            //xac dinh bao nhieu dong
                            $display = 15;
                            // tinh tong so trang can hien thi
                            if (isset($_GET['page']) && (int) $_GET['page']) {
                                $page = $_GET['page'];
                            } else { //neu chua xac dinh, thi tim so trang
                                $itemList = getUsersOfGroup($_REQUEST['clubId']);
                                $rows = count($itemList);
//                                echo '<script>alert("'.$rows.'");</script>';
                                $record = $rows[0];
                                if ((int) $record > (int) $display) {
                                    $page = ceil($record / $display);
                                } else {
                                    $page = 1;
                                }
                            }

                            $start = (isset($_GET['start']) && (int) $_GET['start'] >= 0) ? $_GET['start'] : 0;
                            $index = $start;

                            for ($i = 0; $i < count($itemList); $i++) {
                                $index = $index + 1;

                                $item = getUser_byId($itemList[$i]->UserId);
//                                echo '<script>alert("'.$item->FullName.'");</script>';
                                echo'<li class="user-item">
                                            <div class="user-item-rank">
                                                    ' . $index . '
                                            </div>
                                            <div class="user-item-avatar-panel">
                                                    <span class="user-avt" style="background-image: url(' . $item->Avatar . ')"></span>
                                            </div>
                                            <span class="user-item-name">' . $item->Name . '</span>
                                            <div class="user-item-score">
                                                    ' . $item->Scores . '
                                            </div>
                                            <div class="user-item-icon-panel">
                                                    <img src="resources/img/png1.png"/>
                                            </div>

                                    </li>';
                            }
                            ?>
                        </ul>

                        <div class="page-cont-control">
                            <?php
                            if ($page > 1) { //neu can hien thi so trang        
                                $next = $start + $display;
                                $prev = $start - $display;
                                $current = ($start / $display) + 1;

                                //Hien thi trang Previous
                                if ($current != 1) {
                                    //echo "<li><a href='userranking.php?start=$prev&page=$page'>Previous</a></li>";
//                                    echo'<div class="page-cont-button" id="page-cont-button-next"></div>';
                                }
                                //Hien thi so link
                                for ($i = 1; $i <= $page; $i++) {
                                    if ($current != $i) {
                                        //echo "<li><a href='userranking.php?start=".($display*($i-1))."&page=$page'>$i</a></li>";
                                        echo'<a class="btn-page" href="userranking.php?start=' . ($display * ($i - 1)) . '&page=' . $page . '">' . $i . '</a>';
                                    } else {
                                        echo '<a class="btn-page active" >' . $i . '</a>';
                                    }
                                } //End: FOR
                                //Hien thi trang Next

                                if ($current != $page) {
                                    //echo "<li><a href='userranking.php?start=$next&page=$page'>Next</a></li>";
//                                    echo'<div class="page-cont-button" id="page-cont-button-prev"></div>';
                                }
                            }//End: $page > 1 IF
                            ?>
                        </div>
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
