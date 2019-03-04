<?php
	session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/member_information/member_information_model.php';
	class show_information_page{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$username = $_SESSION['username'];
			
			$model = new member_information_model();
		    $model_data = $model->show_information_page($username);

			$member['username'] = $model_data[0][0];
			$member['oldpassword'] = $model_data[0][1];
			$member['addr'] = $model_data[0][2];
			$member['phone'] = $model_data[0][3];
			return json_encode($member);
		}
	}
?>