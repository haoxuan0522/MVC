<?php
    require_once 'include/php/model.php';
    class manager_product_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_delete_action($product_id){
	    	$sql = "DELETE FROM cobol_mvc_finalwork_product WHERE product_id=?";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute(array($product_id));
			return $result;
        }
        public function do_insert_action($product_name,$product_stock,$product_price){
            $update = 0;
	    	$stmt_select_product_name = $this->conn->query("SELECT product_name, product_stock FROM cobol_mvc_finalwork_product");
			$result_select_product_name = $stmt_select_product_name -> fetchAll();
			foreach($result_select_product_name as $rows){
				if($rows['product_name'] == $product_name){
					$new_stock = $rows['product_stock'] + $product_stock;
					$update = 1;
					break;
				}
			}
			if($update == 0){
				$sql = "INSERT INTO cobol_mvc_finalwork_product (product_id, product_name, product_stock, product_price) VALUES (?, ?, ?, ?)";
				$stmt = $this->conn->prepare($sql);
				$result = $stmt->execute(array(null, $product_name, $product_stock, $product_price));
			}
			if($update == 1){
				$sql = "UPDATE cobol_mvc_finalwork_product SET product_stock=:product_stock WHERE product_name=:product_name";
				$stmt = $this->conn->prepare($sql);
				$result = $stmt->execute(array(":product_stock"=>$new_stock, ":product_name"=>$product_name));
			}
			return $result;
        }
        public function do_search_action($product_name){
	        $stmt = $this->conn->query("SELECT product_id,product_name,product_stock,product_price FROM cobol_mvc_finalwork_product WHERE product_name LIKE '%$product_name%'");
			$result = $stmt -> fetchAll();
			return $result;
        }
        public function do_select_action(){
	        $stmt = $this->conn->query("SELECT * FROM cobol_mvc_finalwork_product");
			$result = $stmt -> fetchAll();
			return $result;
        }
        public function do_update_action($product_id,$product_name,$product_stock,$product_price){
	        $sql = "UPDATE cobol_mvc_finalwork_product SET product_name=:product_name, product_stock=:product_stock, product_price=:product_price WHERE product_id=:product_id";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute(array(":product_name"=>$product_name, ":product_stock"=>$product_stock, ":product_price"=>$product_price, ":product_id"=>$product_id));
			return $result;
        }
        public function show_product_page(){
	        $stmt = $this->conn->query("SELECT * FROM cobol_mvc_finalwork_product");
			$result = $stmt -> fetchAll();
			return $result;
        }
        public function show_update_page($product_id){
	        $stmt = $this->conn->query("SELECT product_id,product_name,product_stock,product_price FROM cobol_mvc_finalwork_product WHERE product_id = '$product_id'");
			$result = $stmt -> fetchAll();
			return $result;
        }
    }
?>