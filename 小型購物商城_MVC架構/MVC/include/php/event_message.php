<?php
    class event_message{
        
        private $get = null;
        private $post = null;
        
        public function __construct($get,$post){
            $this -> get = $get;
            $this -> post = $post;
        }
        public function getGET(){
            return $this -> get;
        }
        public function getPOST(){
            return $this -> post;
        }
    }
?>