<?php
    require_once 'include/php/db_connect.php';
    require_once 'modules/manager_order/manager_order_model.php';
    class do_shipping_action{
    	public function actionPerformed(event_message $em){
    	    $post = $em->getPOST();
    		$order_id = $post['order_id'];
			
			$model = new manager_order_model();
		    $model_data = $model->do_shipping_action($order_id);
    	}
    }
?>
