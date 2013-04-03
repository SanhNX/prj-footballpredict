<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/menu.css" rel="stylesheet" />

        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script src="js/jquery-1.8.3.min.js"></script>

    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="main">
            <div class="header">
                <div class="header-container">
                    <div class="header-menu"><ul class="menu-list">
                            <li class="menu-item"><a href="#" id="menu-item1">Item 1</a></li>
                            <li class="menu-item"><a href="#" id="menu-item1">Item 2</a></li>
                            <li class="menu-item"><a href="#" id="menu-item1">Item 3</a></li>
                            <li class="menu-item"><a href="#" id="menu-item1">Item 4</a></li>
                        </ul>
                    </div>
                    <div class="header-logo">LOGO</div>
                    <div class="header-log">
                        <div class="btn-expand-login">Login</div>
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
                        <ul class="match-list">
                            <?php
                            include 'DAO/connection.php';
                            include 'DTO/object.php';
                            include 'BLL/predictBll.php';
                            // ---------------------------------


                            $itemList = getMatchListOfLeagues(1);
                            for ($i = 0; $i < count($itemList); $i++) {
                                $item = $itemList[$i];
                                $startTime = date_format(date_create($item->StartTime), 'l, d F Y h:i');
                                $clubA = getClub_byId($item->ClubA);
                                $clubB = getClub_byId($item->ClubB);
//                                echo '<script>alert("'.$clubA->Logo.'");</script>';
                                echo '<li class = "match-item">';
                                echo '<div class = "match-item-icon-panel">';
                                echo '<img src = "'. $clubA->Logo .'"/><img src = "'. $clubB->Logo .'"/>';
                                echo '</div>';
                                echo '<div class = "match-item-name-panel">';
                                echo '<span class = "match-item-name">';
                                echo '<span class = "match-item-cap">'. $clubA->Name .' - '. $clubB->Name .'</span><br>';
                                echo '<span class = "match-item-sub">'. $startTime .'</span>';
                                echo '</span>';
                                echo '</div>';
                                echo '<div class = "match-item-num-panel">';
                                echo '<input class = "match-item-num-input" type = "number" tabindex="1" size="2" autocomplete="off" min="0" max="99" pattern="[0-9]*"/>';
                                echo '<input class = "match-item-num-input" type = "number" tabindex="1" size="2" autocomplete="off" min="0" max="99" pattern="[0-9]*"/>';
                                echo '</div>';
                                echo '</li>';
                            }
                            ?>
                        </ul>

                        <div class="page-cont-control">
                            <div class="page-cont-button" id="page-cont-button-next"></div>  
                            <div class="page-cont-button" id="page-cont-button-prev"></div>  
                            <div class="page-cont-button-save" id="page-cont-button-save">Save</div>  
                        </div>
                    </div>
                    <div class="page-cont-right">
                        <div class="page-cont-title light">
                            <span class="cont-title-bold">Text</span>
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
            <div class="footer">
                <div class="footer-container">
                    <div class="footer-menu"><ul class="nav-list">
                            <li class="nav-item"><a href="#" id="nav-item1">Item 1</a></li>
                            <li class="nav-item"><a href="#" id="nav-item1">Item 2</a></li>
                            <li class="nav-item"><a href="#" id="nav-item1">Item 3</a></li>
                            <li class="nav-item"><a href="#" id="nav-item1">Item 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
