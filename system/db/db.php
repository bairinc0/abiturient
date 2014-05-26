<?php
	/*
	 * Класс устанавливает соединение с базой данный и предоставляет методы для работы с БД
	 * Использование:	
		 $db=new DB("siteFolder");
		 print_r( $db->getNumRow("news",array("typeid"=>1)));//количество записей в таблице с атрибутом typeid=1
		 print_r( $db->getNumRow("news"));//количество записей в таблице
		 echo $db->insertOneRow("news",array("name"=>"NEWS!!!","typeid"=>1));//вставка нового кортежа в таблицу
		 $db->deleteAllRow("news",array("typeid"=>1));	//удаление всех кортежей из таблицы с  атрибутом typeid=1
		 $db->updateRow("observer_students","student_id",1,array("student_name"=>"МУМУМУМ","group_id"=>100));//обновление кортежа 
	 * */	

	class DB{
		private $DBH;
		private $query;
		function __construct($siteRoot){
			require_once($_SERVER['DOCUMENT_ROOT'].$siteRoot.'/system/config/config.php');
			$config=Config::getConfig($siteRoot);
			if ($config->getValue("configLoaded")){
				$this->DBH=new PDO("mysql:host=".$config->getValue("host").";dbname=".$config->getValue("dbname"),$config->getValue("user"),$config->getValue("pass"),  
                                    array ( PDO :: MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES cp1251 " )             );
				$this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        	}							
			else{
				//не может подключится к БД -  не загружен конфиг
				//LogFileWrite
				$this->DBH=false;
			}
		}
		function getDBH(){
			return $this->DBH;
		}
		function setQuery($query){
			$this->query=$query;
		}
		function execute($data=false){
			if ($this->query!=""){
				$STH=$this->DBH->prepare($this->query);
				if ($data){
					$STH->execute($data);					
				}				
				else{
					$STH->execute();
				}
				return $STH;
			}
			else{
				return false;
			}
		}
		function fetchSTH($STHexecuted){
			if ($STHexecuted){
				$STHexecuted->setFetchMode(PDO::FETCH_ASSOC);
				$result=array();
				while ($row=$STHexecuted->fetch()){
					array_push($result,$row);
				}			
				return $result;
			}
			else{				
				return false;
			}	
		}
		function getNumRow($table,$data=false){
			//Функция вернёт количество кортежей в таблице
			if (!$data){
				$this->setQuery('SELECT COUNT(*) AS numRow FROM `'.$table.'`');	
			}
			else{			
				$str="SELECT COUNT(*) AS numRow FROM `".$table."` WHERE TRUE ";
				$data1=array();	
				foreach(array_keys($data) as $keys){
					$str=$str." AND `".$keys."` = ?";
					array_push($data1,$data[$keys]);
				}
				$this->setQuery($str);
			}			
			$STH=$this->execute($data1);						
			if ($STH){
				$STH->setFetchMode(PDO::FETCH_ASSOC);
				$result=$STH->fetch();							
				return $result['numRow'];
			}
			else{				
				return 0;
			}		
		}
		function getAllRow($table,$data=false){
			//Возвращает все строки запроса
			if(!$data){
				$this->setQuery("SELECT * FROM $table");
				$data1=false;		
			}
			else{
				$str="SELECT * FROM `".$table."` WHERE TRUE ";
				$data1=array();	
				foreach(array_keys($data) as $keys){
					$str=$str." AND `".$keys."` = ?";
					array_push($data1,$data[$keys]);
				}
				$this->setQuery($str);				
			}
			$STH=$this->execute($data1);			
			if ($STH){
				$STH->setFetchMode(PDO::FETCH_ASSOC);
				$result=array();
				while ($row=$STH->fetch()){
					array_push($result,$row);
				}			
				return $result;
			}
			else{				
				return false;
			}
		}
		function insertOneRow($table,$data){
			$keystr="";
			$valuestr="";
			$data1=array();
			foreach(array_keys($data) as $keys){
				$keystr=$keystr.', `'.$keys.'`';	
				array_push($data1,$data[$keys]);
				$valuestr=$valuestr.", ?";
			}		
			$keystr=strstr ( $keystr , ' ');
			$valuestr=strstr ( $valuestr , ' ');
			$this->setQuery("INSERT INTO `".$table."` (".$keystr.") VALUES (".$valuestr.")");
			$STH=$this->execute($data1);
			if ($STH){
				return $this->DBH->lastInsertId();
			}
			else{
				return false;
			}						
		}
		function deleteAllRow($table,$data=false){
			$str="DELETE FROM `".$table."` WHERE TRUE ";
			if ($data){
				$data1=array();
				foreach(array_keys($data) as $keys){
					$str=$str." AND `".$keys."` = ?";
					array_push($data1,$data[$keys]);
				}		
			}
			else{
				$data1=false;
			}
			$this->setQuery($str);
			
			
			$STH=$this->execute($data1);
			if ($STH){				
				return true;
			}
			else{
				return false;
			}						
		}
		function updateRow($table,$field,$value,$data){
			$sql_data=array();
			foreach($data as $key=>$elem){				
				array_push($sql_data,"`".$key."`='".$elem."'");
			}			
			$sql=implode(',',$sql_data);
			$sql="UPDATE `".$table."` SET ".$sql." WHERE `".$field."`=".$value." LIMIT 1";
			$this->setQuery($sql);
			$STH=$this->execute();
			if ($STH){
					return true;
			}
			else{
					return false;
			}		
		}
	}
	
?>