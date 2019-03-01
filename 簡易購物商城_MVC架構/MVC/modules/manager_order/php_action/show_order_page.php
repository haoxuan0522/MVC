<?php
    require_once 'include/php/db_connect.php';
    require_once 'include/php/event_message.php';
    require_once 'modules/manager_order/manager_order_model.php';
    class show_order_page{
    	public function actionPerformed(event_message $em){
    		$model = new manager_order_model();
		    $model_data = $model->show_order_page();
    		
    		$run_count = 0;
    		foreach($model_data as $rows){
    		    if($rows["order_status"] == '訂單處理中'){
    		        $order['content'][] = $rows["order_id"] . '  .  ' . $rows["order_username"] . '    ' . $rows["order_all_price"];
                    $order['order_status'][] = 0;
    		    }
    		    else{
    		        $order['content'][] = $rows["order_id"] . '  .  ' . $rows["order_username"] . '    ' . $rows["order_all_price"] . '    ' . $rows["order_status"] . "<br />";
    		        $order['order_status'][] = 1;
    		    }
    		    $run_count++;
    		    $order['order_id'][] = $rows["order_id"];
    		}
    		$order['run_count'] = $run_count;
    	    return json_encode($order);
    	}
    }
?>
