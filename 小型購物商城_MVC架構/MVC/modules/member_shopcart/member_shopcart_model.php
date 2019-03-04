<?php
    require_once 'include/php/model.php';
    class member_shopcart_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_addorder_action($end_count,$all_price){
    	    try{
				$sql = "INSERT INTO cobol_mvc_finalwork_order (order_id, order_username, order_all_price, order_status) VALUES (?, ?, ?, ?)";
				$stmt_insert_order = $this->conn->prepare($sql);
				$result_insert_order = $stmt_insert_order->execute(array(null, $_SESSION['username'], $all_price, '訂單處理中'));
				
				$stmt_select_order_id = $this->conn->query("SELECT max(order_id) FROM cobol_mvc_finalwork_order");
				$result_select_order_id  = $stmt_select_order_id->fetch();
				
				for($b = 1 ; $b <= $end_count ; $b++){
					if(isset($_SESSION['item_id'][$b])){
						$sql = "INSERT INTO cobol_mvc_finalwork_order_content (order_content_id, order_id, product_id, product_name, product_count, product_price, product_totalprice) VALUES (?, ?, ?, ?, ?, ?, ?)";
						$stmt_insert_order_content = $this->conn->prepare($sql);
						$result_insert_order_content = $stmt_insert_order_content->execute(array(null,$result_select_order_id[0],$_SESSION['item_id'][$b],$_SESSION['item_name'][$b],$_SESSION['item_count'][$b],$_SESSION['item_price'][$b],$_SESSION['item_totalprice'][$b]));
						
						$stmt_select_stock = $this->conn->query("SELECT product_stock FROM cobol_mvc_finalwork_product WHERE product_id =" . $_SESSION['item_id'][$b]);
						$result_select_stock = $stmt_select_stock->fetch();
						
						$new_stock = $result_select_stock[0] - $_SESSION['item_count'][$b];
						$sql = "UPDATE cobol_mvc_finalwork_product SET product_stock=:product_stock WHERE product_id =" . $_SESSION['item_id'][$b];
						$stmt_update_product_stock = $this->conn->prepare($sql);
						$result_update_product_stock = $stmt_update_product_stock->execute(array(":product_stock"=>$new_stock));
					}
				}
				$data['insert_order'] = $result_insert_order;
				$data['select_order_id'] = $result_insert_order;
				$data['insert_order_content'] = $result_insert_order_content;
				$data['select_stock'] = $result_select_stock;
				$data['update_product_stock'] = $result_update_product_stock;
				return $data;
			}
			catch(Exception $e){
				echo $e->getMessage();
			}
        }
    }
?>