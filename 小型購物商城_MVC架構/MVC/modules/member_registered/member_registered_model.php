<?php
    require_once 'include/php/model.php';
    class member_registered_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_registered_action($registered_username,$registered_password,$registered_addr,$registered_phone){
    		$sql = "INSERT INTO cobol_mvc_finalwork_member (id, username, password, addr, phone, permissions) VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute(array(null, $registered_username, $registered_password, $registered_addr, $registered_phone, null));
			return $result;
        }
    }
?>