<?php
	class Event extends DomainObject{
		//���������� ��������� �������
		protected $table="abiturient_events";
		protected $modelName="event";
		//���������� ��������
		private $event_name;
		private $event_icon;
		
		//- ������� � �������
		public function setName($event_name){
			$this->event_name=$event_name;
		}		
		public function getName(){
			return $this->event_name;
		} 
		
		public function setIcon($event_icon){
			$this->event_icon=$event_icon;
		}
		public function getIcon(){
			return $this->event_icon;
		}
		//-������ � ��
		protected function insertObject(){
			$this->db->insertOneRow($this->table,$this->getArray());
		}
		protected function updateObject(){
			$this->db->updateRow($this->table,$this->modelName."_id",$this->id,$this->getArray());	
		}
		public function deleteSpec(){		
			$this->db->deleteAllRow('abiturient_event_connect',array('event_id'=>$this->getId()));			
		}
		//--��������� ������ � ������
		public function setObject($data){
			$this->setName($data['event_name']);	
			$this->setIcon($data['event_icon']);				
		}
		public function getArray(){
			return array("event_name"=>$this->event_name,"event_icon"=>$this->event_icon);
		}		
	}
?>