<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class do_insert_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
		  	$product_name = $post['product_name'];
			$product_stock = $post['product_stock'];
			$product_price = $post['product_price'];

			$model = new manager_product_model();
		    $model_data = $model->do_insert_action($product_name,$product_stock,$product_price);

			$msg = "";
			if($model_data == 0){
				$msg = '新增失敗';
			} 
			else{
				$msg = '新增成功';
			}		
			return $msg;
		}
	}
?>