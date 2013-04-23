<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet"/>
        <link href="css/gridview.css" rel="stylesheet"/>
        <link href="css/menu.css" rel="stylesheet"/>
        <link  rel="stylesheet" type="text/css" href="css/new-group.css"/>
        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script type="text/javascript" src="scripts/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="scripts/jquery-latest.js"></script>
        <script type="text/javascript" src="scripts/jquery.numeric.js"></script>
        <script type="text/javascript" src="scripts/main.js"></script>
        <script type="text/javascript" src="scripts/ajax-vaildate.js"></script>
        <script type="text/javascript" src="scripts/ajax-search.js"></script>        
        <script type="text/javascript" src="scripts/ajax-creategroup.js"></script>        
        <script type="text/javascript" src="scripts/webtoolkit.aim.js"></script> 
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
                                <span class="cont-title-bold">' . $item->Name . '</span><span class="cont-title-sub"></span>
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
                            echo '<a class = "grid-item-button-your-group" onclick="leavegroup(' . $_REQUEST['clubId'] . ', ' . $_SESSION['UserId'] . ')">Leave this group</a>';
                            echo '</li>';
                            echo '</ul><span class="detail-group-error"></span><div class="right-content"><div class="group-details">
                                    <p>
                                        <span class="group-details-label">by</span>
                                        <a href="#">' . $item->CreateBy . '</a>  
                                        <span href="#" onclick="editGroup()" style="color:#FFF;">(click to edit)</span>
                                    </p>
                                    <p>
                                        <span class="group-details-label">Type </span>
                                        Public pool, everybody can join
                                    </p>
                                    <p>
                                        <span class="group-details-label">Members </span>
                                        <span class="pool-members-count">' . count(getUsersOfGroup($_REQUEST['clubId'])) . '</span>
                                    </p>
                                    <p class="group-description">
                                        <span class="group-details-label">Description </span> 
                                        <span class="description">' . $item->Description . '</span>
                                    </p>
                                    <input id="typeHidden" type="hidden" value="'.$item->Type.'" />
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
        <div class="popup undisplayed" id="edit-group-popup">
            <div class="popup-container">
                <div class="popup-form">
                    <div class="page-cont-title">
                        <span class="cont-title-bold">Create new group</span><span class="cont-title-sub"></span>
                        <span class="popup-btn-close" id="popup-btn-edit-group-close"></span>
                    </div>
                    <div class="page-cont-title-sub">
                        <span class="cont-title-sub"></span>
                        <i class="sub1"></i>
                    </div>
                    <form id="editGroupForm" name="editGroupForm" action="BLL/edit-groupBll.php" 
                          onsubmit="return AIMEDIT.submit(this, {'onStart': startEditCallback, 'onComplete': completeEditCallback})"
                          method="post" enctype="multipart/form-data">
                        <div class="popup-create-pool-info">
                            <div class="popup-input-row"><span>Name</span><input id="txtgName" name="txtgName" type="text" /></div>
                            <div class="popup-area-row">
                                <span>Description</span>
                                <textarea id="txtgDescription" name="txtgDescription" class="" maxlength="4096"></textarea>
                            </div>
                        </div>

                        <span class="wrap hotness">


                            <div class="popup-create-pool-group">
                                <div class="popup-create-pool-group-avt">
                                    <img id="thumbimage" class="popup-create-pool-img"  src="images/icon/default-pool-avt-bg.png" />
                                    <!-- <a class="removeimg" href="javascript:" >remove</a>-->
                                </div>
                                <div class="popup-btn-upload">
                                    <span href="javascript:" >Choose file</span>
                                    <input id="gUploadfile" name="gFile" class="file" type="file" onchange="readURL(this);"/>
                                </div>
                                <!--<a class="removeimg undisplayed" href="javascript:" >remove</a>-->
                            </div>

                            <div class="popup-control-row">
                                <div class="popup-input-check-row">
                                    <input id="popup-input-pool-check" name="isprivate" class="css-checkbox popup-input-check" type="checkbox" value="a" checked="true"/>
                                    <label for="popup-input-pool-check" class="css-label dark-check-green">This group is private
                                        (Only you can invite others to this group)</label>
                                    <div class="create-group-error-mess"></div>
                                </div>
                                
                                <?php
                                    echo '<input name="idHidden" type="hidden" value="'.$_REQUEST['clubId'].'" />';
                                ?>
                                <input id="btn-create-group" type="submit" class="popup-btn-upload" value="Save" />
                            </div>
                    </form>
                    <span class="create-loading-spin undisplayed"></span>
                </div>
                <div class="popup-bottom"></div>
            </div>
        </div>
    </body>
</html>
