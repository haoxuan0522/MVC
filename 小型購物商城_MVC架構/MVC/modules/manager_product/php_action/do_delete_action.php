<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class do_delete_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$product_id = $post['product_id'];
			if($product_id == null){
				return $msg = 0;
			}

			$model = new manager_product_model();
		    $model_data = $model->do_delete_action($product_id);

			$msg = "";
			if($model_data == 0){
				$msg = '刪除失敗';
			} 
			else{
				$msg = '刪除成功';
			}
			return $msg;
		}
	}
?>