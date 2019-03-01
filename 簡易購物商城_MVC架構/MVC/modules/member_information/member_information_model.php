<?php
    require_once 'include/php/model.php';
    class member_information_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_password_action($username,$newpassword){
	    	$sql = "UPDATE cobol_mvc_finalwork_member SET password=:password WHERE username=:username";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute(array(":password"=>$newpassword, ":username"=>$username));
            return $result;
        }
        public function do_update_action($information_addr,$information_phone,$username){
            $sql = "UPDATE cobol_mvc_finalwork_member SET addr=:addr, phone=:phone WHERE username=:username";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute(array(":addr"=>$information_addr, ":phone"=>$information_phone, ":username"=>$username));
			return $result;
        }
        public function show_information_page($username){
            $stmt = $this->conn->query("SELECT username, password, addr, phone FROM cobol_mvc_finalwork_member WHERE username = '$username'");
			$result = $stmt -> fetchAll();
			return $result;
        }
    }
?>