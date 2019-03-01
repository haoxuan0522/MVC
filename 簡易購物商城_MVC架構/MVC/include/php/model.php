<?php
    require_once 'db_connect.php';
    abstract class model{
        protected $conn = null;
        public function __construct(){
            $this->conn = db_connect::getConnect();
        }
    }
?>