<?php
	session_start();
	class do_logout_action{
		public function actionPerformed(event_message $em){
		    unset($_SESSION['username']);
		}
	}
?>