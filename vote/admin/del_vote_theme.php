<?php

	 require '../includes/comm.inc.php';
	 
	 isAccess();
	 
	 if(isset($_GET['id']) && !empty($_GET['id'])){
	 	mysqlQuery("SELECT `vt_id` FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'"); 	
	 	if(mysql_affected_rows() == 0){
	 		alertBack('没有该投票主题!');
	 	}
	 	mysqlQuery("DELETE FROM `vt_theme` WHERE `vt_id`='{$_GET['id']}'");
	 	
	 	if(mysql_affected_rows() == 1){
	 		mysqlQuery("DELETE FROM `vt_list` WHERE 'vt_vid'='{$_GET['id']}'");	

	 		if(mysql_affected_rows() == 1){
	 			mysql_close($conn);
	 			alertLocation('删除投票主题成功!', 'vote_manager.php');	 			
	 		}elseif(mysql_affected_rows() == 0){
	 			mysql_close($conn);
	 			alertLocation('删除主题选项失败!', 'vote_manager.php');
	 		}
	 	}elseif(mysql_affected_rows() == 0){
	 		mysql_close($conn);
	 		alertBack('删除投票主题失败!');
	 	}
	 }else{
	 	alertBack('非法参数!');
	 }
?>