<?php
    session_start();
    require_once 'include/php/db_connect.php';
    require_once 'include/php/event_message.php';
    require_once 'modules/member_order/member_order_model.php';
    class show_order_content_page{
    	public function actionPerformed(event_message $em){
    	    $post = $em->getPOST();
    		$order_id = $post['order_id'];
			if($order_id == null){
				$order_content['content'] = 0;
				return json_encode($order_content);
			}
			
			$model = new member_order_model();
		    $model_data = $model->show_order_content_page($order_id);
			$run_count = 0;
    		foreach($model_data['order_content'] as $rows){
				$order_content['product_name'][] = $rows['product_name'];
				$order_content['product_count'][] = $rows['product_count'];
				$order_content['product_price'][] = $rows['product_price'];
				$order_content['product_totalprice'][] = $rows['product_totalprice'];
				$run_count++;
			}
			$order_content['all_price'] = $model_data['order_all_price'];
			$order_content['run_count'] = $run_count;
		    return json_encode($order_content);
    	}
    }
?>
