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
							<h3>Are you a real football fan?</h3>
							<h3>Are you eager to prove that to your friends?</h3>
							</br>
							<p>Football Challenge allows you to predict the results of your favorite football games.</p>
							<p>The better you predict, the more points you will get.</p>
							<p>Try your best, beat your friends and get to the top of the ranking!</p>
							
                            <h3>1. How to register?</h3>
							<p>You can register through your Facebook account through a simple click.  As an alternative, click </p>
							<p>here or the &#34Registration&#34 link located on the main page.  We don't need too much information </p>
							<p>from you -- just your name, preferred username, password, date of birth, favorite football </p>
							<p>team, avatar, and e-mail address.  Once you're registered, you're ready to begin playing!</p>
							
							<h3>2. What I am playing for?</h3>
							<p>At this time, Football Challenge is just for your pure enjoyment (it's so much fun, right?!).  In  </p>
							<p>the future we will be able to provide free prizes to those users who frequently visit our site </p>
							<p>and to those users who are great at predicting game outcomes!  Stick around for that day to come.</p>
							
							<h3>3. How do I play?</h3>
							<p>Choose the tab &#34My Predictions&#34 and add your respective predictions for the following week. </p>
							<p>You can scroll down and submit your predictions for future rounds as well, but can </p>
							<p>change/update them in due time. Your predictions will be considered final as of 24 hours </p>
							<p>before each game begins. Make sure you have submitted your results by then, or else you</p>
							<p>won&#39t get any points for that round! You will receive a notification email every week letting</p>
							<p>you know that you can submit the results for the following week.</p>
							
							<h3>4. Point system</h3>
                            <p>You earn points for:
                            </p><ul>
                                <li>Proper home team score: +10</li>
                                <li>Proper away team score: +10</li>
                                <li>Proper winner or tie: +40</li>
                                <li>Correct outcome +20 bonus points</li>
                            </ul>
							<p>Your points will be added after each round until the end of the Russian championship</p>
								
                            <h3>5. Can I invite my friends?</h3>
                            <p>Yes you can! Just click on the 'invite friends' button at the top right of the home page and invite </p>
                            <p>your friends. You can type their e-mail addresses or if you logged in by your Facebook account, you </p>
                            <p>can select them from your Facebook friends.</p>
							
                            <h3>6. Can I create a group?</h3>
                            <p>Yes you can! It is very easy and fun to create your own group and have your group ranking to</p>
							
							<p>compete against the group members. To create a group first you should go to "Groups" tab and </p>
							<p>under this tab you should click on "My groups". Here you can see the list if your own groups. To </p>
							<p>create a new group you just need to click on "Create a new group" button. All you need to do is </p>
							<p>pick a name and logo for your group and then invite your friends either by typing their e-mail </p>
							<p>addresses or through your Facebook account. You can either create an open or closed group. Open </p>
							<p>groups will be visible under the global groups list and other members will be able to join your </p>
							<p>group. Closed groups are going to be open only people who were invited by the members of that </p>
							<p>group. (Note for the developers: group names should be unique, so that system should check the </p>
							<p>names and warn the user if the name is not available anymore).</p>
							

                            <h3>7. How can I join a group?</h3>
                            <p>Go to "Groups" tab. Here you will see the list of all groups. (If they are open to public). All you need </p>
							<p>to do is click in "Join this group" button under the logo if that group.</p>
                        </div>
                        <div class="page-cont-ref faq"></div>

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
