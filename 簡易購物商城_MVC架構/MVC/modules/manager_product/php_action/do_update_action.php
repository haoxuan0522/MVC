<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class do_update_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
		    $product_id = $post['product_id'];
			$product_name = $post['product_name'];
			$product_stock = $post['product_stock'];
			$product_price = $post['product_price'];

			$model = new manager_product_model();
		    $model_data = $model->do_update_action($product_id,$product_name,$product_stock,$product_price);

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