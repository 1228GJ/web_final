<?php
	header('Content-Type:text/html;charset="UTF-8"');
	session_start();	 
	date_default_timezone_set('PRC');	//北京时间
	require('conn.inc.php');	//数据库连接
	require('func.inc.php');		//函数库
?>