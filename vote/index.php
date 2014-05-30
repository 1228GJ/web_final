<?php
	 //连接数据库和函数库
	 require 'includes/comm.inc.php';
	 //显示投票主题
	 $queryTheme = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_time` FROM `vt_theme` ORDER BY `vt_id` DESC");
	 //显示系统公告
	 $queryNotice = mysqlQuery("SELECT `vt_title`,`vt_content` FROM `vt_notice` ORDER BY `vt_id` DESC LIMIT 6");
?>
<html>
<head>
<!--用bootstrap!-->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="images/favicon.ico">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<script type="text/javascript" src="js/index.js"></script>

<title>Homepage of Voting</title>
<style type="text/css">
</style>

</head>

<body>
<center>
	
	<div id="container"> 	
		<div id="header">
			<div id="title">
				<div id="sitetitle">Vote</div>
			</div>
		</div>

	<div id="banner">
       	<div id="banner_text">
            <div id="title">Welcome To Voting Page</div>
			<br>
            <p>
            This is a website for you to vote for the musics you like.
            </p>
    	</div>
	</div>				
		   
    <div id="menu">
     	<ul>
			<li><a href="../index.php" class="current">Music Page</a></li>

            <li><a href="#">Vote</a></li> 			         
        </ul>  
    </div>
    
		<?php 
			include 'includes/nav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
			  <p>Welcome(IP:<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>),Time:<span class="blue"><?php echo date('Y-m-d',time())?></span></p>
		  </div>
			<div id="main-left">
				<dl id="gonggao">
					<dt>Notice</dt>
					<marquee scrollamount="1" scrolldelay="40" direction="up" width="200" height="140" onMouseOver="this.stop()" onMouseOut="this.start()">
					<?php 
						while(!!$rsNotice = fetchArray($queryNotice)){
					?>
					<dd><a href="javascript:;" title="<?php echo $rsNotice['vt_content'];?>"><?php echo mb_substr($rsNotice['vt_title'], 0,12,'utf-8').'...';?></a></dd>
					<?php 
						}
					?>
					</marquee>
				</dl>
				<dl id="contact">
					<dt class="STYLE1">Contact me:</dt>
					<dd>Tel:18811437792</dd>
				</dl>
				
				
			</div>
			<div id="main-mid">
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th class="voteid">ID</th>
							<th class="votetitle">Voting Theme </th>
							<th class="votetime">Starting Time </th>
						
						</tr>
						<?php 
							while(!!$rsTheme = fetchArray($queryTheme)){
						?>
						<tr>
							<td class="voteid"><?php echo $rsTheme['vt_id']; ?></td>
							<td class="votetitle"><a href="vote_detail.php?id=<?php echo $rsTheme['vt_id'];?>"><?php echo mb_substr($rsTheme['vt_title'], 0,18,'UTF-8'); ?></a></td>
							<td class="votetime"><?php $str = explode(' ',$rsTheme['vt_time']); echo $str[0];?></td>
							
						</tr>
						<?php 
							}
						?>					
					</tbody>
				</table>
			</div>
			<div id="main-right">
				<form action="search.php" method="get" name="searchform">
					<dl id="search">
						<dt>Search Voting Theme </dt>
						<dd><input type="text" name="keyword" value="search" class="keyword"/>
						</dd>
						<dd><input type="submit" name="search" value="search" class="sub"/>
						</dd>
					</dl>
				</form>
				<dl id="down">
					<dt> Announcement:</dt>
					<tr>
					<dt>You can click on every voting theme to see the voting results.</dt>
					<dd>
					
					</dd>
				</dl>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		
		<div id="footer">
			<a href="../index.php">Home</a> | <a href="#">Vote</a> | <br />
			Copyright<a href="mailto:12281139@bjtu.edu.cn"  title="邮箱" >12281139@bjtu.edu.cn</a>
		</div>
	</div>
	</center>
</body>
</html>