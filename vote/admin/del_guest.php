<?php

	require '../includes/comm.inc.php';
	
	isAccess();
	
	if(isset($_GET['id']) && !empty($_GET['id'])){

		mysqlQuery("SELECT `vt_id` FROM `vt_guest` WHERE `vt_id`='{$_GET['id']}'");
		if(mysql_affected_rows() == 0){
			alertBack('没有该留言建议!');
		}

		mysqlQuery("DELETE FROM `vt_guest` WHERE `vt_id`='{$_GET['id']}'");
		
		if(mysql_affected_rows() == 1){
			mysql_close($conn);
			alertLocation('删除留言建议成功!', 'guest_manager.php');
		}else{
			mysql_close($conn);
			alertBack('删除留言建议失败!');
		}
	}else{
		alertBack('非法参数!');
	}	 
	 
?>