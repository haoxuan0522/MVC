<?php
    session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/member_information/member_information_model.php';
	class do_update_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$information_addr = $post['information_addr'];
			$information_phone = $post['information_phone'];
			$username = $_SESSION['username'];
			
			$model = new member_information_model();
		    $model_data = $model->do_update_action($information_addr,$information_phone,$username);
			
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