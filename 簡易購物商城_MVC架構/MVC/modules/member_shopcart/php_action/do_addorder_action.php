<?php
	session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/member_shopcart/member_shopcart_model.php';
	class do_addorder_action{
		public function actionPerformed(event_message $em){
			$post = $em->getPOST();
			$end_count = $post['end_count'];
			$all_price = $post['all_price'];
			
			$model = new member_shopcart_model();
		    $model_data = $model->do_addorder_action($end_count,$all_price);

			if($model_data['insert_order'] != 0 && $model_data['select_order_id'] != 0 && $model_data['insert_order_content'] != 0 && $model_data['select_stock'] != 0 && $model_data['update_product_stock'] != 0){
				for($c = 0 ; $c <= $end_count ; $c++){
					unset($_SESSION['item_name'][$c]);
					unset($_SESSION['item_stock'][$c]);
					unset($_SESSION['item_price'][$c]);
					unset($_SESSION['item_count'][$c]);
					unset($_SESSION['item_totalprice'][$c]);
					unset($_SESSION['item_id'][$c]);
			    }
				return '結帳成功';
			}
			else{
				return '結帳失敗';
			}
		}
	}
?>
