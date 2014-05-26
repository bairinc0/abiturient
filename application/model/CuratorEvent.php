<?php
	//Данный класс описывает событие связанное с абитуриентом (беседы проведённые с ним и тд)
	class CuratorEvent extends DomainObject{
		//определяем специфику объекта
		protected $table="abiturient_curator_events";
		protected $modelName="curator_event";
		//определяем атрибуты
		private $description;//описание
		private $type;//0 - другое, 1 - разговор по телефону ...
		private $abiturient_id;//id абитуриента
		private $uploaddate;//дата загрузки
		private $creator_id;//тот кто создал запись
		//- Сеттеры и геттеры
		public function setDescription($description){
			$this->description=$description;
		}		
		public function getDescription(){
			return $this->description;
		} 
		public function setType($type){
			$this->type=$type;
		}		
		public function getType(){
			return $this->type;
		} 
		public function setAbiturient($abiturient){
			$this->abiturient=$abiturient;
		}		
		public function getAbiturient(){
			return $this->abiturient;
		}
		public function setUploaddate($uploaddate){
			$this->uploaddate=$uploaddate;
		}		
		public function getUploaddate(){
			return $this->uploaddate;
		}
		public function setCreator($creator){
			$this->creator=$creator;
		}		
		public function getCreator(){
			return $this->creator;
		}
		//-работа с БД
		protected function insertObject(){
			$this->db->insertOneRow($this->table,$this->getArray());
		}
		protected function updateObject(){
			$this->db->updateRow($this->table,$this->modelName."_id",$this->id,$this->getArray());	
		}
		public function deleteSpec(){}
		//--подгрузка данных в объект
		public function setObject($data){
			$this->setDescription($data['description']);	
			$this->setType($data['type']);
			$this->setAbiturient($data['abiturient_id']);
			$this->setUploaddate($data['uploaddate']);
			$this->setCreator($data['creator_id']);			
		}
		public function getArray(){
			return array("description"=>$this->getDescription(),"type"=>$this->getType(),"abiturient_id"=>$this->getAbiturient(),"uploaddate"=>$this->getUploaddate(),"creator_id"=>$this->getCreator());
		}		
	}
?>