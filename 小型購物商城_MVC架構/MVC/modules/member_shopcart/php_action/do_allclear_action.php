<?php
	session_start();
	class do_allclear_action{
		public function actionPerformed(event_message $em){
		    unset($_SESSION['item_id']);
			unset($_SESSION['item_name']);
			unset($_SESSION['item_count']);
			unset($_SESSION['item_price']);
			unset($_SESSION['item_totalprice']);
			return '購物車已清空';
		}
	}
?>