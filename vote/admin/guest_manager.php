<?php

	 require '../includes/comm.inc.php';
	 
	 isAccess();
	 
	 if(isset($_GET['page'])){
	 	$page = $_GET['page'];
	 	if(empty($page) || $page<0 || !is_numeric($page)){	
	 		$page = 1;
	 	}else{
	 		$page = intval($_GET['page']);
	 	}
	 }else{
	 	$page = 1;
	 }
	 $pagelimit = 10;
	 
	 $query = mysqlQuery("SELECT `vt_id` FROM `vt_guest`");
	 $counter = mysql_num_rows($query);	
	 
	 if($counter == 0){
	 	$pagenum = 1;
	 }else{
	 	$pagenum = ceil($counter/$pagelimit);	
	 }
	 
	 if($page > $pagenum){
	 	$page = $pagenum;
	 }
	 $pag = ($page-1)*$pagelimit;
	 
	 $query = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_content`,`vt_time`  FROM  `vt_guest` ORDER BY `vt_time` DESC LIMIT   $pag,$pagelimit");	 
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/favicon.ico">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guest-manager.css" />
<link rel="stylesheet" type="text/css" href="styles/page_list_text.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>后台管理--留言管理</title>
</head>
<body>
	<div id="container">
<div id="header">
    	<div id="title">
            <div id="sitetitle">Vote</div>
        </div>
    </div>

	<div id="banner">
       	<div id="banner_text">
            <div id="title">Welcome To Vote Page</div>
			<br>
            <p>
            This is a Page for you to vote for the musics you like.
            </p>
    	</div>
	</div>				
		   
    <div id="menu">
     	<ul>
			<li><a href="../../index.php" class="current">Music Page</a></li>

            <li><a href="#">Vote</a></li> 			         
        </ul>  
    </div>
		<?php 
			include 'includes/adminnav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
			  <p>Welcome(IP:<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>),Time:<span class="blue"><?php echo date('Y-m-d',time())?></span></p>
		  </div>
			<div id="guest-manager">
				<center>留言建议管理中心</center>	
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th>留言标题</th>
							<th>留言内容</th>
							<th>留言时间</th>
							<th>操作</th>
						</tr>
						<?php 
							if(mysql_affected_rows() == 0){
						?>
						<tr>
							<td colspan="4">There is no suggestion.</td>
						</tr>	
						<?php 
							}else{
								while(!!$rs = fetchArray($query)){
						?>
						<tr>
							<td><?php echo $rs['vt_title']; ?></td>
							<td><?php echo $rs['vt_content']; ?></td>
							<td><?php echo $rs['vt_time']; ?></td>
							<td><a href="del_guest.php?id=<?php echo $rs['vt_id']; ?>" name="delguest">Delete</a></td>
						</tr>
						<?php 
								}
							}
						?>						
					</tbody>
				</table>
			</div>
			<?php 
				pageListText('guest_manager.php', '?', $pagenum, $page);
			?>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>