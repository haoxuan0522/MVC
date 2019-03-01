<?php
	require_once 'include/php/db_connect.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class do_select_action{
		public function actionPerformed(){
			$model = new manager_product_model();
		    $model_data = $model->do_select_action();
		    
			$msg = '';
			foreach($model_data as $rows){
				$msg .= "<input type=radio name=id value=$rows[product_id]>" . $rows["product_id"] . '  .  ' . $rows["product_name"] . '   ' . $rows["product_stock"] . '   ' . $rows["product_price"] . "<br />";
			}
		    return $msg;
		}
	}
?>
