<?php
    require_once 'include/php/model.php';
    class member_product_model extends model{
        public function __construct(){
            parent::__construct();        
        }
        public function do_addcart_action($product_id,$product_count,$item_exist){
    		try{
    			$sql_1 = $this->conn->query("SELECT product_name, product_stock, product_price FROM cobol_mvc_finalwork_product WHERE product_id = '$product_id'");
    			$list_1 =$sql_1->fetch();
    			if($list_1['product_stock'] == 0 || $product_count > $list_1['product_stock']){
                    return $msg = '庫存不足';
    			}
    			else{
        			if(count($list_1) != 0){
        				$end_product_data['product_name'] = $list_1[0];
        				$end_product_data['product_stock'] = $list_1[1];
        				$end_product_data['product_price'] = $list_1[2];
        		    }
    			    if(isset($_SESSION['item_id'])){
    			        $record_product = 0;
        				for($i = 1 ; $i <= $product_id ; $i++){
        				    if(isset($_SESSION['item_id'][$i])){
            					if($_SESSION['item_id'][$i] == $product_id){
            						$item_exist = true;
            						$record_product = $i;
            						break;
            					}
        				    }
        				}
        			}
    			
        			$tmp_name="";
        			$tmp_stock=0;
        			$tmp_price=0;
        			$tmp_count=0;
        			$tmp_totalprice=0;
        			$tmp_id=0;
    			
        			if(!$item_exist){
        				if(count($list_1)!=0){
        					$tmp_name = $end_product_data['product_name'];
        					$tmp_stock = $end_product_data['product_stock'];
        					$tmp_price = $end_product_data['product_price'];
        					$tmp_count = $product_count;
        					$tmp_totalprice = $tmp_count * $tmp_price;
        					$tmp_id = $product_id;
        				}
        				$_SESSION['item_name'][$tmp_id] = $tmp_name;
        				$_SESSION['item_stock'][$tmp_id] = $tmp_stock;
        				$_SESSION['item_price'][$tmp_id] = $tmp_price;
        				$_SESSION['item_count'][$tmp_id] = $tmp_count;
        				$_SESSION['item_totalprice'][$tmp_id] = $tmp_totalprice;
        				$_SESSION['item_id'][$tmp_id] = $tmp_id;
        			}
        			else{
        				if(count($list_1)!=0){
        					$tmp_stock = $end_product_data['product_stock'];
        					$tmp_price = $end_product_data['product_price'];
        					$tmp_count = $product_count;
        					$tmp_totalprice = $tmp_count * $tmp_price;
        				}
        				if($_SESSION['item_count'][$record_product] < $tmp_stock){
        					$_SESSION['item_count'][$record_product] += $tmp_count;
        					$_SESSION['item_totalprice'][$record_product] += $tmp_price * $tmp_count;
        				}
        			}
    			}
    			}
    			catch (Exception $ex) {
    				printf($ex);
    			}
    			return $msg = '加入購物車成功';
        }
        public function show_product_page(){
            $stmt = $this->conn->query("SELECT * FROM cobol_mvc_finalwork_product");
			$result = $stmt -> fetchAll();
			return $result;
        }
    }
?>