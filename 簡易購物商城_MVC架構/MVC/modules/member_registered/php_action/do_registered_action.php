<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/member_registered/member_registered_model.php';
	class do_registered_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$registered_username = $post['registered_username'];
			$registered_password = $post['registered_password'];
			$registered_addr = $post['registered_addr'];
			$registered_phone = $post['registered_phone'];
			
			$model = new member_registered_model();
		    $model_data = $model->do_registered_action($registered_username,$registered_password,$registered_addr,$registered_phone);

			$msg = "";
			if($model_data == 0){
				$msg = '註冊失敗';
			} 
			else{
				$msg = '註冊成功';
			}		
			return $msg;
		}
	}
?>