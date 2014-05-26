<?php
	require_once("Region.php");
	class School extends DomainObject{
		//���������� ��������� �������
		protected $table="abiturient_school";
		protected $modelName="school";
		//���������� ��������
		private $name;
		private $region;
		
		//- ������� � �������
		public function setName($name){
			$this->name=$name;
		}	
		public function setRegion(Region $region){
			$this->region=$region;
		}	 
		public function getName(){
			return $this->name;
		}
		public function getRegion(){
			return $this->region;
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
			$this->setName($data['school_name']);
			$region=new Region($this->db);
			$region->getObject($data['region_id']);
			$this->setRegion($region);			
		}
		public function getArray(){
			return array("school_name"=>$this->name,'region_id'=>$this->region->getId());
		}		
	}
?>