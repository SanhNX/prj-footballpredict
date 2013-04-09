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
        <?php
        // put your code here
        ?>
        <div class="main">
            <?php
            include 'headerpanel.php';
            ?>

            <div class="page">
                <div class="page-container">
                    <div class="page-cont-left home">
                        <div class="page-cont-title faq">
                        </div>
                        <div class="page-cont-title">
                            <span class="cont-title-bold">Frequently asked questions</span><span class="cont-title-sub"></span>
                        </div>
                        <div class="page-cont-title-sub">
                            <span class="cont-title-sub">Your questions?</span>
                            <i class="sub0"></i>
                        </div>
                        <div class="page-cont-text">
                            <h3>How does the scoring work?</h3>
                            <p>You earn points for:
                            </p><ul>
                                <li>Proper home team score: +5</li>
                                <li>Proper away team score: +5</li>
                                <li>Proper winner or tie: +20</li>
                                <li>Bonus for correct outcome: +10</li>
                            </ul>
                            <h3>Until when can I change my prediction?</h3>
                            <p>You can change your predictions as often as you want until the start of the match.</p>
                            <h3>Can I change my favorite team setting</h3>
                            <p>Yes you can: you'll find this option in the Settings page (when you are logged in).</p>
                            <h3>How do I create my own pool?</h3>
                            <p>Click on the tab 'Pools' on top of the homepage and then 'Create new pool'</p>

                            <h3>What is a private pool?</h3>
                            <p>When creating a pool you can choose to make it private or public:
                            </p><ul>
                                <li>In private pools only the person who started the group can invite friends;</li>
                                <li>In public pools anyone can invite friends and participants can also sign up without invitation;</li>
                                <li>In both pools only the person who started the pool can remove participants.</li>
                            </ul>
                            <h3>Do you have another question?</h3>
                        </div>
                        <div class="page-cont-ref faq"></div>
                        <div class="page-home-row-btn faq">Send us a message</div>

                    </div>
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
