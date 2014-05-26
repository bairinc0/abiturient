<?php
	//������ ����� ��������� ������� ��������� � ������������ (������ ���������� � ��� � ��)
	class CuratorEvent extends DomainObject{
		//���������� ��������� �������
		protected $table="abiturient_curator_events";
		protected $modelName="curator_event";
		//���������� ��������
		private $description;//��������
		private $type;//0 - ������, 1 - �������� �� �������� ...
		private $abiturient_id;//id �����������
		private $uploaddate;//���� ��������
		private $creator_id;//��� ��� ������ ������
		//- ������� � �������
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
		//-������ � ��
		protected function insertObject(){
			$this->db->insertOneRow($this->table,$this->getArray());
		}
		protected function updateObject(){
			$this->db->updateRow($this->table,$this->modelName."_id",$this->id,$this->getArray());	
		}
		public function deleteSpec(){}
		//--��������� ������ � ������
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