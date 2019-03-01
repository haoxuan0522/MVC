<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_order/manager_order_model.php';
	class do_search_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$order_username = $post['order_username'];
			if($order_username == ''){
				$msg = 'err';
				return $msg;
			}
			
			$model = new manager_order_model();
		    $model_data = $model->do_search_action($order_username);
		    
		    $msg="";
			foreach($model_data as $rows){
				$msg .= $rows["order_id"].'  .  '.$rows["order_all_price"]."&nbsp".$rows["order_username"] . "<br />";
			}
			return $msg;
		}
	}
?>