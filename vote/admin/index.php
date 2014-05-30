<?php
	 require '../includes/comm.inc.php';
	isAccess(); 
?>

<html>
<head>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />
<script type="text/javascript" src="js/index.js"></script>
<title>Admin</title>
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
			<div id="main-bottom">
				<p>Introduction:</p>
				<p>This is a page for back-stage managenment.As a administration,you can do five things.</p>
				<ul>
					<li>Add the voting themes;</li>
					<li>Add the voting options;</li>
					<li>Delete voting themes;</li>
					<li>Manage message records;</li>
					<li>Add system notice.</li>		
				</ul>

			</div>
		</div>
		<?php 
			include 'includes/footer.inc.php';
		?>
	</div>
</body>
</html>