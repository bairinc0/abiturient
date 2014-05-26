<?php
	/*
	 * класс Регистр - Фасад для работы с сессией 
	 * */
	//
	class Registry{		
		private static $instance;
		private function __construct(){
		}		
		public function getValue($key){
			return $_SESSION[$key];
		}
		public function setValue($key,$value){			
			$_SESSION[$key]=$value;						
		}
		public static function getRegistry(){
			if (empty(self::$instance)){
				self::$instance=new Registry();
			}
			return self::$instance;
		}
	}	 		
?>