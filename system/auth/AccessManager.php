<?php
	//подключаем всех манагеров для удобства
	require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/auth/AbiturientAccessManager.php");
	//сам класс
	abstract class AccessManager{
		//дефолтные таблицы
		protected $userTable="user";
		protected $userStatusTable="userstatus";
		protected $privelegiesTable="privelegies";
		//атрибуты переопределяемые в дочернем классе
		protected $objectTable="";
		protected $modelName="";
		//атрибуты
		protected $user_id;
		protected $status_id;
		protected $init;
		protected $auth;
		protected $object_id=0;//0-создание
		public function __construct(Init $init){
			$auth=$init->getAuth();
			$user=$auth->getUser();
			$this->user_id=$user['user_id'];
			$this->status_id=$user['user_status'];
			$this->init=$init;
			$this->auth=$auth;
		}
		//геттеры
		public function getUserId(){
			return $this->user_id;
		}
		public function getUserStatus(){
			return $this->status_id;
		}
		//геттеры и сеттеры
		public function getObjectId(){
			return $this->object_id;
		}
		public function setObjectId($object_id){
			$this->object_id=$object_id;
		}
		//-----
		public function callAuth(){//записываем себя в auth
			$this->auth->setAccessManager($this);
		}
		public function getPrivelegies($module_id){//определение прав к объектам модуля
			/* 0 - никаких прав
			 * 1 - изменение только своих объектов
			 * 2 - изменение любых объектов	
			 * 1 1 1 - к модулю 1, статус 1, имеет тип прав 1 (изменение только своих объектов)		 		 
			 * */
			if ($this->init->getDB()->getNumRow($privelegies,array("status_id"=>$this->status_id,"module_id"=>$module_id))>0){
				$privelegies=$this->init->getDB()->getAllRow($privelegies,array("status_id"=>$this->status_id,"object_type_id"=>$object_type_id));
				$privelegies=$privelegies[0]['grant'];
				return $privelegies;
			}
			else{
				return 0;//нету прав
			}			
		}
		public function objectOwner(){
			//Функция находит автора объекта, вернёт 0 если объекта нету
			$objectID=$this->getObjectId();
			if ($this->init->getDB()->getNumRow($this->objectTable,array($this->modelName.'_id'=>$objectID))>0){
				$object_author=$this->init->getDB()->getAllRow($this->objectTable,array($this->modelName.'_id'=>$objectID));
				return $object_author[0]['author_id'];				
			}
			return 0;  
		}
		public function getDelegatedRights($objectID){//возвращает делегированные права на объект			
			/* 0 - никаких прав
			 * 1 - изменение
			 */
			return 0;
		}
	}
?>