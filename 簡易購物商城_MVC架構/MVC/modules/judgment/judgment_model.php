<?php
    require_once 'include/php/model.php';
    class judgment_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_judgment_action($username){
	    	$stmt_select_password = $this->conn->query("SELECT password FROM cobol_mvc_finalwork_member WHERE username = '$username'");
			$result_select_password = $stmt_select_password->fetch();
			$data['password'] = $result_select_password[0];
	        return $data;
        }
    }
    
?>