<?php
	class Doc1 extends DomainObject{
		//���������� ��������� �������
		protected $table="abiturient_document";
		protected $modelName="document";
		//���������� ��������
		private $name;
		
		
		//- ������� � �������
		public function setName($name){
			$this->name=$name;
		}		
		public function getName(){
			return $this->name;
		} 
		//-������ � ��
		protected function insertObject(){
			$this->db->insertOneRow($this->table,$this->getArray());
		}
		protected function updateObject(){
			$this->db->updateRow($this->table,$this->modelName."_id",$this->id,$this->getArray());	
		}
		public function deleteSpec(){
		//?�������� �������	
			//��������� ������� ������			
		}
		//--��������� ������ � ������
		public function setObject($data){
			$this->setName($data['region_name']);			
		}
		public function getArray(){
			return array("region_name"=>$this->name);
		}		
	}
?>