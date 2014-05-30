<?php 
	require '../includes/comm.inc.php';
	if(!empty($_POST['login'])){
		$loginInfo = array();
		$loginInfo['user'] = checkUser($_POST['user'],2,20);
		$loginInfo['pass'] = checkPass($_POST['pass'], 2, 32);
		
		$rs = mysqlFetchArray("SELECT `vt_id` FROM`vt_admin`  WHERE `vt_admin_user`='{$loginInfo['user']}' AND `vt_admin_pass`='{$loginInfo['pass']}'  LIMIT 	1
	");
		
		if(mysql_affected_rows() == 1){
			$_SESSION['user'] = $loginInfo['user'];
			mysql_close($conn);
			alertLocation('登录成功!', 'index.php');
		}elseif(mysql_affected_rows() == 0){
			mysql_close($conn);
			alertBack('登录失败!');
		}
	}
	
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<!--用bootstrap!-->
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<title>Login</title>
</head>
<body>
	<div id="login">
		<form action="" method="post">
			<dl>
				<dt>Administrator Login </dt>
				<dd>
				  <label>UserName:
				  <input type="text" name="user" /></label></dd>
				<dd>
				  <label>Password :
				  <input type="password" name="pass" /></label></dd>
				<dd class="subbtm"><input type="submit" name="login" value="Login" />
				&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" />
				</dd>
			</dl>     
		</form>	
	</div>
</body>
</html>