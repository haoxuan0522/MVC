<?php
	session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/judgment/judgment_model.php';
	class do_judgment_action{
		public function actionPerformed(event_message $em){
		    if(isset($_SESSION['username'])){
		    	$username = $_SESSION['username'];
		    	$model = new judgment_model();
				$model_data = $model->do_judgment_action($username);
		        $judgment['judgment'] = 1;
		        $judgment['username'] = $username;
		        $judgment['password'] = $model_data['password'];
		        return json_encode($judgment);
		    }
		    else{
		    	$judgment['judgment'] = 0;
		        return json_encode($judgment);
		    }
		}
	}
?>