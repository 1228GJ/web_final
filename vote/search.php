<?php
	 require 'includes/comm.inc.php';
	 if(!empty($_GET['search']) && !empty($_GET['keyword'])){
	 	$querySearch = mysqlQuery("SELECT `vt_id`,`vt_title` FROM `vt_theme` WHERE `vt_title` LIKE '%{$_GET['keyword']}%' ORDER BY `vt_time` DESC");	
	 }else{
	 	alertBack('Input again!!');
	 }
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/search-detail.css" />
<title>Search</title>
</head>
<body>
	<div id="container">

		<?php 
			include 'includes/nav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
				<p>Welcome(Ip:<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>),Time::<span class="blue"><?php echo date('Y-m-d',time())?></span></p>
			</div>
			<div id="searchdetail">
				<h4>Search[ <span class="blue"><?php echo $_GET['keyword']; ?></span> ]</h4>
				<ul>
					<?php 
						if(mysql_affected_rows() == 0){
					?>
					<li>There is none,please change another theme. </li>
					<?php 
						}else{
							while(!!$rsSearch = fetchArray($querySearch)){
					?>
					<li><a href="vote_detail.php?id=<?php echo $rsSearch['vt_id']; ?>"><?php echo $rsSearch['vt_title'];?></a></li>
					<?php 
							}
						}
					?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>