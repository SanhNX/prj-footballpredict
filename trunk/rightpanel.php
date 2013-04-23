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
        <li class="page-cont-tip-invite" style="margin-left: 29px; margin-bottom: 9px;">
            <?php
            if (isset($_SESSION['IdFaceBook'])) {
                include 'facebookinvite.php';
            }
            ?>
        </li>
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
                <div class="page-cont-tip-des">Save your prediction by logging in with your email address
                </div>
            </div>
        </li>
        <li class="page-cont-tip-item">
            <div class="page-cont-tip-icon"><i class="tip-num">3</i></div>
            <div class="page-cont-tip-info">
                <div class="page-cont-tip-title">Challenge and follow!</div>
                <div class="page-cont-tip-des">Invite your friends, create groups and compete with each other during this season!
                </div>
            </div>
        </li>
        <!--<div class="line"></div>-->
        <li class="page-cont-tip-item-like-box">
            
            <div class="google-ads">
                <script type="text/javascript"><!--//<![CDATA[
                google_ad_client = "ca-pub-5425751846726392";
                /* skyscraper120x600 */
                google_ad_slot = "4658062125";
                google_ad_width = 120;
                google_ad_height = 405;
                //]]>//-->
                </script>
                <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>
            </div>
            <div class="fb-like-box-container">
                <div class="fb-like-box" data-href="https://www.facebook.com/FootballChallenge.Me" data-width="140" data-height="405" data-show-faces="true" data-stream="false" data-header="false"></div>
            </div>
        </li>
        
    </ul>
    <div class="page-cont-ref">


    </div>
</div>