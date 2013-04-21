<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!--[if !IE]><!-->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link  rel="stylesheet" type="text/css" href="css/new-group.css"/>
        <!--<![endif]-->
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="css/style-ie8.css" />
        <link rel="stylesheet" type="text/css" href="css/new-group-ie8.css" />
        <![endif]-->

        <link href="css/menu.css" rel="stylesheet"/>
        <link href="css/gridview.css" rel="stylesheet"/>

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
                        echo '<div class="page-cont-title">';
                        if (isset($_SESSION["UserName"])) {
                            echo '<span class = "cont-title-bold">Groups</span><span id = "create-group-btn" class = "cont-title-button">Create new group</span>';

                            echo '</div>';


                            $groupsOfUser = getGroupsOfUser($_SESSION['UserId']);
                            if (count($groupsOfUser) > 0) {
                                echo '<div class="page-cont-title-sub">
                                    <span class="cont-title-sub">Your groups</span>
                                    <i class="sub0"></i>
                                </div>
                                <div class="grid-wrapper-your-group">
                                    <ul class="grid-your-group">';
                                for ($i = 0; $i < count($groupsOfUser); $i++) {
                                    $item = getClub_byId($groupsOfUser[$i]->ClubId);
                                    echo '<li class = "item">';
                                    echo '<div class = "grid-icon-panel">';
                                    echo '<img src = "' . $item->Logo . '"/>';
                                    echo '</div>';
                                    echo '<div class = "grid-item-cap">' . $item->Name . '</div>';
                                    echo '<div class = "grid-item-mess">by Tim</div>';
                                    echo '<a class = "grid-item-button-your-group" href="pool-detail.php?clubId=' . $groupsOfUser[$i]->ClubId . '">See your rank</a>';
                                    echo '</li>';
                                }
                                echo '</ul><span class="join-error"></span></div>';
                            }
                        }
                        ?>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub">Available groups</span>
                            <i class="sub0"></i>
                        </div>
                        <div class="popup-input-row"><span>Search</span><input id="txtSearch" name="txtSearch" type="text"/></div>
                        <div class="grid-wrapper">
                            <ul class="grid">
                                <?php
                                $itemList = getClubs("");
                                for ($i = 0; $i < count($itemList); $i++) {
                                    $item = $itemList[$i];
                                    echo '<li class = "item">';
                                    echo '<div class = "grid-icon-panel">';
                                    echo '<img src = "' . $item->Logo . '"/>';
                                    echo '</div>';
                                    echo '<div class = "grid-item-cap">' . $item->Name . '</div>';
                                    echo '<div class = "grid-item-mess">by Tim</div>';
                                    $isGroup = groupExist($item->Id, $_SESSION['UserId']);
                                    if ($isGroup == -1)
                                        echo '<a id="' . $item->Id . '" class = "grid-item-button"  onclick="joingroup(' . $item->Id . ', ' . $_SESSION['UserId'] . ')"> Join</a>';
                                    else
                                        echo '<a id="' . $item->Id . '" class = "grid-item-button disable" > Had Joined</a>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
<!--                            <script type="text/javascript">
                                for(var i = 0; i < 16 ; i++){
                                    var id = $(".grid-item-button")[i].id;
                                    $('#'+id).joingroup();
                                }
                            </script>-->

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
        <div class="popup undisplayed" id="create-group-popup">
            <div class="popup-container">
                <div class="popup-form">
                    <div class="page-cont-title">
                        <span class="cont-title-bold">Create new group</span><span class="cont-title-sub"></span>
                        <span class="popup-btn-close" id="popup-btn-create-group-close"></span>
                    </div>
                    <div class="page-cont-title-sub">
                        <span class="cont-title-sub"></span>
                        <i class="sub1"></i>
                    </div>
                    <form id="createGroupForm" name="createGroupForm" action="BLL/create-groupBll.php" onsubmit="return AIM.submit(this, {'onStart': startCallback, 'onComplete': completeCallback})"
                          method="post" enctype="multipart/form-data">
                        <div class="popup-create-pool-info">
                            <div class="popup-input-row"><span>Name</span><input id="txtgroupname" name="txtgroupname" type="text" /></div>
                            <div class="popup-area-row">
                                <span>Description</span>
                                <textarea id="txtgroupdescription" name="txtgroupdescription" class="" maxlength="4096"></textarea>
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
                                    <input id="uploadfile" name="file" class="file" type="file" onchange="readURL(this);"/>
                                </div>
                                <a class="removeimg undisplayed" href="javascript:" >remove</a>
                            </div>

                            <div class="popup-control-row">
                                <div class="popup-input-check-row">
                                    <input id="popup-input-pool-check" name="isprivate" class="css-checkbox popup-input-check" type="checkbox" value="a" checked="true"/>
                                    <label for="popup-input-pool-check" class="css-label dark-check-green">This group is private
                                        (Only you can invite others to this group)</label>
                                    <div class="create-group-error-mess"></div>
                                </div>
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
