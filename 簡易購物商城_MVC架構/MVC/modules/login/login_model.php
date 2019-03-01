<?php
    require_once 'include/php/model.php';
    class login_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_login_action($username,$password){
	    	$stmt = $this->conn->query("SELECT username, password, permissions FROM cobol_mvc_finalwork_member WHERE username='$username' and password='$password'");
    		$result = $stmt->fetchAll();
    		$data['username'] = $result[0]['username'];
    		$data['password'] = $result[0]['password'];
    		$data['permissions'] = $result[0]['permissions'];
    		return $data;
        }
    }
?>