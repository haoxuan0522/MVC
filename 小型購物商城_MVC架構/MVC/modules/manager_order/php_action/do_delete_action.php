<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_order/manager_order_model.php';
	class do_delete_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$order_id = $post['order_id'];
			if($order_id == null){
				return $msg = 0;
			}
			
			$model = new manager_order_model();
		    $model_data = $model->do_delete_action($order_id);
			
			$msg = "";
			if($model_data['delete_order'] == 0 || $model_data['delete_order_content'] == 0){
				$msg = '刪除失敗';
			} 
			else{
				$msg = '刪除成功';
			}
			return $msg;
		}
	}
?>