<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet"/>
        <link href="css/menu.css" rel="stylesheet"/>
        <link href="css/gridview.css" rel="stylesheet"/>

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
                        <div class="page-cont-title">
                            <span class="cont-title-bold">Groups</span><span class="cont-title-sub">Create new group</span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub">Available groups</span>
                            <i class="sub0"></i>
                        </div>
                            <div class="popup-input-row"><span>Search</span><input id="txtSearch" name="txtSearch" type="text"/></div>
                        <div class="grid-wrapper">
                            <ul class="grid">
                                <?php
                                include 'DAO/connection.php';
                                include 'DTO/object.php';
                                include 'BLL/poolBll.php';
                                // ---------------------------------
                                $itemList = getClubs("");
                                for ($i = 0; $i < count($itemList); $i++) {
                                    $item = $itemList[$i];
                                    echo '<li class = "item">';
                                    echo '<div class = "grid-icon-panel">';
                                    echo '<img src = "' . $item->Logo . '"/>';
                                    echo '</div>';
                                    echo '<div class = "grid-item-cap">' . $item->Name . '</div>';
                                    echo '<div class = "grid-item-mess">by Tim</div>';
                                    echo '<a class = "grid-item-button" href = "#"> Join</a>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>


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
