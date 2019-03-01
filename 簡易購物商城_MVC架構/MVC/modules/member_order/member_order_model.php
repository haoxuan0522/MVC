<?php
    require_once 'include/php/model.php';
    class member_order_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_delete_action($order_id){
	    	$stmt_order_status = $this->conn->query("SELECT order_status FROM cobol_mvc_finalwork_order WHERE order_id = '$order_id'");
    		$result_order_status = $stmt_order_status->fetch();
    		if($result_order_status[0] == '已出貨'){
    		    return $msg = 0;
    		}
    		
    		$run_count = 0;
    		$stmt_product = $this->conn->query("SELECT product_id, product_count FROM cobol_mvc_finalwork_order_content WHERE order_id = '$order_id'");
    		$result_product = $stmt_product->fetchAll();
    		foreach($result_product as $rows){
    		   $product['product_id'][] = $rows['product_id'];
    		   $product['product_count'][] = $rows['product_count'];
    		   $run_count++;
    		}
    		
    		for($i = 0 ; $i < $run_count ; $i++){
    		    $stmt_select_product_stock = $this->conn->query("SELECT product_stock FROM cobol_mvc_finalwork_product WHERE product_id =" . $product['product_id'][$i]);
    		    $result_select_product_stock = $stmt_select_product_stock->fetch();
    		    $new_stock = $result_select_product_stock[0] + $product['product_count'][$i];
    		
        		$sql = "UPDATE cobol_mvc_finalwork_product SET product_stock=:product_stock WHERE product_id=:product_id";
    			$stmt_update_product_stock = $this->conn->prepare($sql);
    			$result_update_product_stock = $stmt_update_product_stock->execute(array(":product_stock"=>$new_stock, ":product_id"=>$product['product_id'][$i]));
    		}
    		
    		$sql = "DELETE FROM cobol_mvc_finalwork_order WHERE order_id=?";
			$stmt_delete_order = $this->conn->prepare($sql);
			$result_delete_order = $stmt_delete_order->execute(array($order_id));
			$sql = "DELETE FROM cobol_mvc_finalwork_order_content WHERE order_id=?";
			$stmt_delete_order_content = $this->conn->prepare($sql);
			$result_delete_order_content = $stmt_delete_order_content->execute(array($order_id));
			
			return $msg = 1;
        }
        public function show_order_content_page($order_id){
            $stmt_select_order_content = $this->conn->query("SELECT product_name, product_count, product_price, product_totalprice FROM cobol_mvc_finalwork_order_content WHERE order_id = '$order_id'");
    		$result_select_order_content = $stmt_select_order_content->fetchAll();
    		
    		$stmt_select_order_all_price = $this->conn->query("SELECT order_all_price FROM cobol_mvc_finalwork_order WHERE order_id = '$order_id'");
    		$result_select_order_all_price = $stmt_select_order_all_price->fetch();
    		
    		$data['order_content'] = $result_select_order_content;
    		$data['order_all_price'] = $result_select_order_all_price[0];
    		return $data;
        }
        public function show_order_page($username){
            $stmt_select_order = $this->conn->query("SELECT order_id, order_all_price, order_status FROM cobol_mvc_finalwork_order WHERE order_username = '$username'");
    		$result_select_order = $stmt_select_order->fetchAll();
    		return $result_select_order;
        }
    }
?>