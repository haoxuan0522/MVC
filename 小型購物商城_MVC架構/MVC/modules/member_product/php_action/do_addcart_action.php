<?php
	session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	require_once 'modules/member_product/member_product_model.php';
	class do_addcart_action{
		public function actionPerformed(event_message $em){
		    $post = $em->getPOST();
        	if(isset($post['product_id'])){
        	    $product_id = $post['product_id'];
        		$product_count = $post['product_count'];
        		$item_exist = false;
        		if($product_count <= 0 || $product_count == ''){
					return $msg = 0;
    			}
        		$model = new member_product_model();
		        $model_data = $model->do_addcart_action($product_id,$product_count,$item_exist);
		        return $model_data;
        	}
        	else{
                return $msg = '加入購物車失敗';
            }
        }
    }
