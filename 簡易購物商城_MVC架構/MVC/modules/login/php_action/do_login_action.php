<?php
    session_start();
    require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/login/login_model.php';
	class do_login_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
		    $username = $post['username'];
        	$password = $post['password'];
		    
		    $model = new login_model();
		    $model_data = $model->do_login_action($username,$password);

		    if($model_data['username'] != null && $model_data['password'] != null){
		        $_SESSION['username'] = $model_data['username'];
        		$_SESSION['login_success'] = true;
        		if($model_data['permissions'] == 'admin'){
        		    $login['permissions_check'] = 1;
        		    $login['username'] = $_SESSION['username'];
        		    return json_encode($login);
		        }
		        else{
        	        $login['permissions_check'] = 0;
        		    $login['username'] = $_SESSION['username'];
        		    return json_encode($login);
        	    }
		    }
            else{
            	$login['permissions_check'] = -1;
            	return json_encode($login);
            }
	    }
	}
?>