<?php
	require_once 'include/php/db_connect.php';
	require_once 'modules/member_product/member_product_model.php';
	class show_product_page{
		public function actionPerformed(){
			$model = new member_product_model();
		    $model_data = $model->show_product_page();
			
			$run_count = 0;
			foreach($model_data as $rows){
				$product['product_id'][] = $rows['product_id'];
				$product['product_name'][] = $rows['product_name'];
				$product['product_stock'][] = $rows['product_stock'];
				$product['product_price'][] = $rows['product_price'];
				$run_count++;
			}
			$product['run_count'] = $run_count;
		    return json_encode($product);
		}
	}
?>
