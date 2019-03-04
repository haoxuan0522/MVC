<?php
    session_start();
    require_once 'include/php/db_connect.php';
    require_once 'include/php/event_message.php';
    require_once 'modules/member_order/member_order_model.php';
    class show_order_page{
    	public function actionPerformed(event_message $em){
    		$username = $_SESSION['username'];
	
    		$model = new member_order_model();
		    $model_data = $model->show_order_page($username);
    		$msg = '';
            
    		foreach($model_data as $rows){
    		    if($rows['order_id'] == ''){
    		        return $msg = 0;
    		    }
    		    $msg .= "<input type=radio name=id value=$rows[order_id]>" . $rows["order_id"] . '  .  ' . $rows["order_all_price"] . "&nbsp&nbsp" . $rows["order_status"]  . "<br />";
    		}
    	    return $msg;
    	}
    }
?>
