<?php
	session_start();
	class do_clear_action{
		public function actionPerformed(event_message $em){
			$post = $em->getPOST();
			$delete_id = $post['delete_id'];
		    unset($_SESSION['item_id'][$delete_id]);
			unset($_SESSION['item_name'][$delete_id]);
			unset($_SESSION['item_count'][$delete_id]);
			unset($_SESSION['item_price'][$delete_id]);
			unset($_SESSION['item_totalprice'][$delete_id]);
		}
	}
?>