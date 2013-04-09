<div class="header">
    <div class="header-container">
        <div class="header-menu">
            <ul class="menu-list">
                <li class="menu-item"><a href="predict.php" id="menu-item1">Prediction</a></li>
                <li class="menu-item"><a href="result.php" id="menu-item2">Result</a></li>
                <li class="menu-item"><a href="pool.php" id="menu-item3">Poules</a></li>
                <li class="menu-item"><a href="userranking.php" id="menu-item4">Ranking</a></li>
                <li class="menu-item"><a href="teamranking.php" id="menu-item5">Team Ranking</a></li>
            </ul>
        </div>
        <div class="header-logo">LOGO</div>
        <div class="header-log">
            <?php
            if (!isset($_SESSION["UserName"]))
                echo '<div class = "btn-expand-login" id = "expand-login-btn">Login</div>';
            else {
                echo '<div class = "lbl-profile" id = "profile-label">';
                echo '<span class="user-name">';
                echo $_SESSION["UserName"];
                echo '</span>';
                echo '<span class="user-avt" style="background-image: url(' . $_SESSION["UserAvatar"] . ')"></span>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>