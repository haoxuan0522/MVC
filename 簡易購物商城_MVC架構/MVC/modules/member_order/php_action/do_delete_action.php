<?php
    session_start();
    require_once 'include/php/db_connect.php';
    require_once 'include/php/event_message.php';
    require_once 'modules/member_order/member_order_model.php';
    class do_delete_action{
    	public function actionPerformed(event_message $em){
    	    $post = $em->getPOST();
    	    $order_id = $post['order_id'];
    		if($order_id == null){
    			return $msg = -1;
    		}
    		
    		$model = new member_order_model();
		    $model_data = $model->do_delete_action($order_id);
    		
			return $model_data;
    	}
    }
?>
