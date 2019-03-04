<?php
    require_once 'include/php/model.php';
    class manager_order_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_delete_action($order_id){
	    	$sql_delete_order = "DELETE FROM cobol_mvc_finalwork_order WHERE order_id=?";
			$stmt_delete_order = $this->conn->prepare($sql_delete_order);
			$result_delete_order = $stmt_delete_order->execute(array($order_id));
			
			$sql_delete_order_content = "DELETE FROM cobol_mvc_finalwork_order_content WHERE order_id=?";
			$stmt_delete_order_content = $this->conn->prepare($sql_delete_order_content);
			$result_delete_order_content = $stmt_delete_order_content->execute(array($order_id));
			
			$data['delete_order'] = $result_delete_order;
			$data['delete_order_content'] = $result_delete_order_content;
    		return $data;
        }
        public function do_search_action($order_username){
        	$stmt = $this->conn->query("SELECT order_id, order_username, order_all_price FROM cobol_mvc_finalwork_order WHERE order_username LIKE '%$order_username%'");
		    $result = $stmt -> fetchAll();
		    return $result;
        }
        public function do_select_action(){
        	$stmt = $this->conn->query("SELECT * FROM cobol_mvc_finalwork_order");
			$result = $stmt -> fetchAll();
			return $result;
        }
        public function do_shipping_action($order_id){
        	$sql = "UPDATE cobol_mvc_finalwork_order SET order_status=:order_status WHERE order_id=:order_id";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute(array(":order_status"=>'已出貨', ":order_id"=>$order_id));
        }
        public function show_order_page(){
        	$stmt_select_order = $this->conn->query("SELECT order_id, order_username, order_all_price, order_status FROM cobol_mvc_finalwork_order");
    		$result_select_order = $stmt_select_order->fetchAll();
    		return $result_select_order;
        }
    }
?>