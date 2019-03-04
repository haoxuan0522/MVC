<?php
	require_once 'include/php/db_connect.php';
	require_once 'modules/manager_product/manager_product_model.php';
	class show_product_page{
		public function actionPerformed(){
			$model = new manager_product_model();
		    $model_data = $model->show_product_page();
		    
			$msg="";
			foreach($model_data as $rows){
				$msg .= $rows['product_id'] . "&nbsp.&nbsp" . $rows['product_name'] . "&nbsp&nbsp&nbsp" . $rows['product_stock'] . "&nbsp&nbsp&nbsp" . $rows['product_price'] . "<br />";
			}
		    return $msg;
		}
	}
?>
