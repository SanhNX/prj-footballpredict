<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!--[if !IE]><!-->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!--<![endif]-->
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css"href="css/style-ie8.css" />
        <![endif]-->
        <link href="css/menu.css" rel="stylesheet"/>
        <link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
        <script src="scripts/jquery-1.8.3.min.js"></script>
        <script src="scripts/jquery-latest.js"></script>
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
                            <span class="cont-title-bold">Overall</span><span class="cont-title-sub"></span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub"></span>
                            <i class="sub0"></i>
                        </div>

                        <ul class="user-list">
                            <?php
                            include ("DAO/connection.php");
                            //xac dinh bao nhieu dong
                            $display = 30;
                            // tinh tong so trang can hien thi
                            if (isset($_GET['page']) && (int) $_GET['page']) {
                                $page = $_GET['page'];
                            } else { //neu chua xac dinh, thi tim so trang
                                $query = "SELECT COUNT(T.fullname) FROM (SELECT fullname, avatar, scores
                                            FROM tbl_user
                                            UNION ALL 
                                            SELECT fullname, avatar, scores
                                            FROM tbl_facebook) AS T";
                                $res = mysql_query($query) or die(mysql_error());
                                $rows = mysql_fetch_array($res);
                                $record = $rows[0];
                                if ((int) $record > (int) $display) {
                                    $page = ceil($record / $display);
                                } else {
                                    $page = 1;
                                }
                            }

                            $start = (isset($_GET['start']) && (int) $_GET['start'] >= 0) ? $_GET['start'] : 0;	
			    $index = $start;
                           
                            $sql = "SELECT fullname, avatar, scores
                                            FROM tbl_user
                                            UNION ALL 
                                            SELECT fullname, avatar, scores
                                            FROM tbl_facebook
                                            ORDER BY Scores DESC 
                                            LIMIT $start, $display";
                            $result = mysql_query($sql) or die(mysql_error());
                            while ($set = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                $index = $index + 1;
                                $name = $set['fullname'];
                                $avatar = $set['avatar'];
                                $scores = $set['scores'];
                                echo'
						<li class="user-item">
							<div class="user-item-rank">
								' . $index . '
							</div>
							<div class="user-item-avatar-panel">
								<span class="user-avt" style="background-image: url(' . $avatar . ')"></span>
							</div>
							<span class="user-item-name">' . $name . '</span>
							<div class="user-item-score">
								' . $scores . '
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
