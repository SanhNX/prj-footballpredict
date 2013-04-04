<?php
// put your code here
include ("DAO/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<link href="css/style.css" rel="stylesheet"/>
	<link href="css/menu.css" rel="stylesheet"/>
	<link rel="SHORTCUT ICON" href="images/icon/logo-head.png"/>
	<script src="js/jquery-1.8.3.min.js"></script>

</head>
<body>
<div class="main">
	<div class="header">
		<div class="header-container">
			<div class="header-menu">
				<ul class="menu-list">
					<li class="menu-item"><a href="#" id="menu-item1">Item 1</a></li>
					<li class="menu-item"><a href="#" id="menu-item2">Item 2</a></li>
					<li class="menu-item"><a href="#" id="menu-item3">Item 3</a></li>
					<li class="menu-item"><a href="#" id="menu-item4">Item 4</a></li>
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
                
				<ul class="user-list">
					<?php
                    	                	//xac dinh bao nhieu dong
					$display = 10;
					// tinh tong so trang can hien thi
					if(isset($_GET['page']) && (int)$_GET['page']) {
						$page = $_GET['page'];
					} else { //neu chua xac dinh, thi tim so trang
						$query = "SELECT COUNT(id) FROM tbl_user";
						$res= mysql_query($query)or die(mysql_error());
						$rows = mysql_fetch_array($res);
						$record = $rows[0];
						if((int)$record > (int)$display) {
							$page = ceil($record/$display);
						} else {
							$page = 1;
						}
					}
					
					$start = (isset($_GET['start']) && (int)$_GET['start']>=0) ? $_GET['start'] : 0;
					$sql = "SELECT fullname , avatar ,scores
							FROM tbl_user
							ORDER BY scores DESC
							LIMIT $start, $display";
					$result = mysql_query($sql)or die(mysql_error());
					$index = 0;
					while($set = mysql_fetch_array($result, MYSQL_ASSOC)) {
						$index = $index + 1; 
						$name = $set['fullname'];
						$avatar = $set['avatar'];
						$scores = $set['scores'];
						echo'
						<li class="user-item">
							<div class="user-item-rank">
								'. $index .'
							</div>
							<div class="user-item-avatar-panel">
								<span class="user-avt" style="background-image: url('. $avatar .')"></span>
							</div>
							<span class="user-item-name">'. $name .'</span>
							<div class="user-item-score">
								'. $scores .'
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
						if($page > 1) { //neu can hien thi so trang        
							$next = $start + $display;
							$prev = $start - $display;
							$current = ($start/$display)+1;
							
							//Hien thi trang Previous
							if($current !=1) {
							//echo "<li><a href='UserRanking.php?start=$prev&page=$page'>Previous</a></li>";
							echo'<div class="page-cont-button" id="page-cont-button-next"></div>';
							}
							//Hien thi so link
							for($i=1;$i<=$page;$i++) {
								if($current != $i) {
								//echo "<li><a href='UserRanking.php?start=".($display*($i-1))."&page=$page'>$i</a></li>";
								echo'<div class="page-cont-button" id="page-cont-button-save">
										<a href="UserRanking.php?start='.($display*($i-1)).'&page='. $page .'">'.$i.'</a>
									</div>';
								} else {
									echo '<div class="page-cont-button">'.$i.'</Div>';
								}
							} //End: FOR
							
							//Hien thi trang Next
							
							if($current != $page) {
								//echo "<li><a href='UserRanking.php?start=$next&page=$page'>Next</a></li>";
								echo'<div class="page-cont-button" id="page-cont-button-prev"></div>';
							}
							
						}//End: $page > 1 IF
					?>
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
							<div class="page-cont-tip-des">You will score points when you predict the correct winner, or
								the exact score of one or both teams
							</div>
						</div>
					</li>
					<li class="page-cont-tip-item">
						<div class="page-cont-tip-icon"><i class="tip-num">2</i></div>
						<div class="page-cont-tip-info">
							<div class="page-cont-tip-title">Enter your predictions</div>
							<div class="page-cont-tip-des">You will score points when you predict the correct winner, or
								the exact score of one or both teams
							</div>
						</div>
					</li>
					<li class="page-cont-tip-item">
						<div class="page-cont-tip-icon"><i class="tip-num">3</i></div>
						<div class="page-cont-tip-info">
							<div class="page-cont-tip-title">Enter your predictions</div>
							<div class="page-cont-tip-des">You will score points when you predict the correct winner, or
								the exact score of one or both teams
							</div>
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
			<div class="footer-menu">
				<ul class="nav-list">
					<li class="nav-item"><a href="#" id="nav-item1">Item 1</a></li>
					<li class="nav-item"><a href="#" id="nav-item2">Item 2</a></li>
					<li class="nav-item"><a href="#" id="nav-item3">Item 3</a></li>
					<li class="nav-item"><a href="#" id="nav-item4">Item 4</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

</body>
</html>
