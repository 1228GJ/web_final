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
	 $pagelimit = 10;	//每分页显示10条数据
	 
	 $query = mysqlQuery("SELECT `vt_id` FROM `vt_notice`");
	 $counter = mysql_num_rows($query);		//总记录条数
	 
	 if($counter == 0){
	 	$pagenum = 1;
	 }else{
	 	$pagenum = ceil($counter/$pagelimit);		
	 }
	 
	 if($page > $pagenum){
	 	$page = $pagenum;
	 }
	 $pag = ($page-1)*$pagelimit;
	 $query = mysqlQuery("SELECT `vt_id`,`vt_title`,`vt_admin`,`vt_content` FROM `vt_notice` ORDER BY `vt_time` DESC LIMIT $pag,$pagelimit");	 
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/notice-manager.css" />
<link rel="stylesheet" type="text/css" href="styles/page_list_text.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>后台管理--公告管理</title>
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
			<div id="notice-manager">
				<center>系统公告管理中心</center>
				<h4><a href="add_notice.php">添加系统公告</a></h4>			
				<table cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<th>公告主题</th>
							<th>公告内容</th>
							<th>发布人</th>
							<th>操作</th>
						</tr>
						<?php 
							if(mysql_affected_rows() == 0){
						?>
						<tr>
							<td colspan="4">暂时没有公告,请添加公告!</td>
						</tr>	
						<?php 
							}else{
								while(!!$rs = fetchArray($query)){
						?>
						<tr>
							<td><?php echo $rs['vt_title']; ?></td>
							<td><?php echo $rs['vt_content']; ?></td>
							<td><?php echo $rs['vt_admin']; ?></td>
							<td><a href="del_notice.php?id=<?php echo $rs['vt_id']; ?>" name="delnotice">Delete</a></td>
						</tr>
						<?php 
								}
							}
						?>
					</tbody>
				</table>
			</div>
			<?php 
				pageListText('notice_manager.php', '?', $pagenum, $page);
			?>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>