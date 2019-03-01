<?php
	class db_connect{
		static $db_host;
    	static $db_name;
	    static $db_user;
	    static $db_password;
		static function getConnect(){
		 	 $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8" , self::$db_host , self::$db_name);
		 	 $conn = new PDO($dsn , self::$db_user , self::$db_password);
			 return $conn;
		}
	}
?>