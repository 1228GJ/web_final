<?php

	require '../includes/comm.inc.php';
	
	isAccess();
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		mysqlQuery("SELECT `vt_id` FROM `vt_notice` WHERE `vt_id`='{$_GET['id']}'");
		if(mysql_affected_rows() == 0){
			alertBack('没有该系统公告!');
		}
		mysqlQuery("DELETE FROM `vt_notice` WHERE `vt_id`='{$_GET['id']}'");
		
		if(mysql_affected_rows() == 1){
			mysql_close($conn);
			alertLocation('删除系统公告成功!', 'notice_manager.php');
		}else{
			mysql_close($conn);
			alertBack('删除系统公告失败!');
		}
	}else{
		alertBack('非法参数!');
	}	 
	 
?>