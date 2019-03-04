<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class show_update_page{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$product_id = $post['product_id'];

			if($product_id == null){
				$product['update'] = 0;
				return json_encode($product);
			}
			$model = new manager_product_model();
		    $model_data = $model->show_update_page($product_id);

			$product['product_id'] = $model_data[0][0];
			$product['product_name'] = $model_data[0][1];
			$product['product_stock'] = $model_data[0][2];
			$product['product_price'] = $model_data[0][3];
			return json_encode($product);
		}
	}
?>