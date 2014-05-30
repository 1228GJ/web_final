<?php
	 require 'includes/comm.inc.php';
	 if(!empty($_POST['guest'])){
	 	$guestInfo = array();
	 	$guestInfo['title'] = mysql_real_escape_string(chkNtitle($_POST['title'],2,50));
	 	$guestInfo['content'] = mysql_real_escape_string(chkNcontent($_POST['content'],10,255));
	 	
	 	mysqlQuery("INSERT INTO `vt_guest`(`vt_title`,`vt_content`,`vt_ip`,`vt_time`) VALUES('{$guestInfo['title']}','{$guestInfo['content']}','{$_SERVER['REMOTE_ADDR']}',NOW())");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysql_close($conn);
	 		alertLocation('留言成功!谢谢!', 'index.php');
	 	}else{
	 		mysql_close($conn);
	 		alertBack('留言失败!');
	 	}
	 }
?>

<html>
<head>
<!--用bootstrap!-->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<link rel="stylesheet" type="text/css" href="styles/guestbook.css" />

<title>suggestion</title>
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
			<li><a href="../index.php" class="current">Music Page</a></li>

            <li><a href="#">Vote</a></li> 			         
        </ul>  
    </div>

		<?php 
			include 'includes/nav.inc.php';
		?>
		<div id="main">
			<div id="main-top">
				<p>Welcome(Ip:<span class="blue"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>),Time:<span class="blue"><?php echo date('Y-m-d',time())?></span></p>
			</div>
			<div id="addguest">
				<form action="" method="post" name="guestform">
					<dl>
						<dt>voice message </dt>
						<dd>
						  <label>headline:
						  <input type="text" name="title" class="title"/></label></dd>
						<dd>
						  <label>contents:
						  <textarea name="content"></textarea></label></dd>
						<dd><input type="submit" name="guest" value="Add" />
						</dd>
						<dd><a href="javascript:;" onclick="history.go(-1);">Back</a></dd>
					</dl>
				</form>
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