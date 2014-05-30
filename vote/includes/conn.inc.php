<?php
//连接数据库的文件
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_NAME', 'vt_vote');
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('数据库连接失败!');
	mysql_select_db(DB_NAME) or die('数据库不存在!');
	mysql_query("SET NAMES UTF8");
?>