<?php
	class Doc1 extends DomainObject{
		//определяем специфику объекта
		protected $table="abiturient_document";
		protected $modelName="document";
		//определяем атрибуты
		private $name;
		
		
		//- Сеттеры и геттеры
		public function setName($name){
			$this->name=$name;
		}		
		public function getName(){
			return $this->name;
		} 
		//-работа с БД
		protected function insertObject(){
			$this->db->insertOneRow($this->table,$this->getArray());
		}
		protected function updateObject(){
			$this->db->updateRow($this->table,$this->modelName."_id",$this->id,$this->getArray());	
		}
		public function deleteSpec(){
		//?написать функцию	
			//подчищаем таблицу связок			
		}
		//--подгрузка данных в объект
		public function setObject($data){
			$this->setName($data['region_name']);			
		}
		public function getArray(){
			return array("region_name"=>$this->name);
		}		
	}
?>