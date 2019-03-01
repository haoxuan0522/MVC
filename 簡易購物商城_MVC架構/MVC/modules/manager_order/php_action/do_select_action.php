<?php
	require_once 'include/php/db_connect.php';
	require_once 'modules/manager_order/manager_order_model.php';
	class do_select_action{
		public function actionPerformed(){
			$model = new manager_order_model();
		    $model_data = $model->do_select_action();
		    
		    $msg = '';
			foreach($model_data as $rows){
				$msg .= "<input type=radio name=id value=$rows[order_id]>" . $rows["order_id"] . '  .  ' . $rows["order_username"] . "<br />";
			}
		    return $msg;
		}
	}
?>
