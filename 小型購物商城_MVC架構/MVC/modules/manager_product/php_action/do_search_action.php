<?php
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class do_search_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
			$product_name = $post['product_name'];
			if($product_name == ''){
				$msg = 'err';
				return $msg;
			}
			
			$model = new manager_product_model();
		    $model_data = $model->do_search_action($product_name);

			$msg="";
			foreach($model_data as $rows){
				$msg .= $rows["product_id"].'  .  '.$rows["product_name"]."&nbsp&nbsp&nbsp".$rows["product_stock"]."&nbsp&nbsp&nbsp".$rows["product_price"]."<br />";
			}
			return $msg;
		}
	}
?>