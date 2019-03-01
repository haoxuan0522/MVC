<?php
    session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/member_information/member_information_model.php';
	class do_password_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$username = $_SESSION['username'];
			$newpassword = $post['newpassword'];
			$model = new member_information_model();
		    $model_data = $model->do_password_action($username,$newpassword);
		    
			$msg = "";
			if($model_data == 0){
				$msg = '修改失敗';
			} 
			else{
				$msg = '修改成功';
			}		
			return $msg;
		}
	}
?>