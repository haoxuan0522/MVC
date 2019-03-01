<?php
	session_start();
	require_once 'include/php/db_connect.php';
	require_once 'include/php/event_message.php';
	class show_shopcart_page{
		public function actionPerformed(event_message $em){
		    if(empty($_SESSION['item_id'])){
		        $product['null_id'] = 0;
		        $product['null'] = '購物車為空的';
		        return json_encode($product);
		    }
		    else{
		        $product['null_id'] = 1;
                $start_count = 0;
                $end_count = 51;
                while(true){
                    $start_count++;
                    if(isset($_SESSION['item_id'][$start_count])){
                        break;
                    }
                }
                while(true){
                    $end_count--;
                    if(isset($_SESSION['item_id'][$end_count])){
                        break;
                    }
                }
                for($count_next = $start_count ; $count_next <= $end_count ; $count_next++){
                    if(isset($_SESSION['item_id'][$count_next])){
                        $product['product_id'][$count_next] = $_SESSION['item_id'][$count_next];
                        $product['product_name'][$count_next] = $_SESSION['item_name'][$count_next];
                        $product['product_price'][$count_next] = $_SESSION['item_price'][$count_next];
                        $product['product_count'][$count_next] = $_SESSION['item_count'][$count_next];
                        $product['product_totalprice'][$count_next] = $_SESSION['item_totalprice'][$count_next];
                    }
                }
                $product['start_count'] = $start_count;
                $product['end_count'] = $end_count;
                return json_encode($product);
		    }
        }
    }
