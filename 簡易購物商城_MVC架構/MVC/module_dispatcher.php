<?php
    require_once 'include/php/event_message.php';
    require_once 'include/php/db_connect.php';
    
    $body = (new Main())->run();
    echo $body;
    
    class Main{
        private $module;
        public function __construct(){
            $string = file_get_contents("config.json");
            $config = json_decode($string, true);
            db_connect::$db_host = $config["db"]["db_host"];
            db_connect::$db_name = $config["db"]["db_name"];
            db_connect::$db_user = $config["db"]["db_user"];
            db_connect::$db_password = $config["db"]["db_password"];
            // $this->module = $config["default_module"];
        }
        public function run(){
            if(isset($_GET['module'])){
                $module=$_GET['module'];
            }
            else{ 
                $module='sample_module';    
            }
            require_once "modules" . "/" . $module. "/" . 'action_dispatcher.php';
            $module_object = new action_dispatcher();

            $event_message = new event_message($_GET, $_POST);
            $body = $module_object->doAction($event_message);
            return $body;
        }
    }
?>
