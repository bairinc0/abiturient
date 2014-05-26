<?php
	class EGESubject extends DomainObject{
		//���������� ��������� �������
		protected $table="abiturient_ege_subject";
		protected $modelName="subject";
		//���������� ��������
		private $subject_name;
		private $subject_icon;
		private $mark=0;
		
		//- ������� � �������
		public function setName($subject_name){
			$this->subject_name=$subject_name;
		}		
		public function getName(){
			return $this->subject_name;
		} 
		public function setMark($mark){
			$this->mark=$mark;
		}		
		public function getMark(){
			return $this->mark;
		}
		public function setIcon($subject_icon){
			$this->subject_icon=$subject_icon;
		}
		public function getIcon(){
			return $this->subject_icon;
		}
		//-������ � ��
		protected function insertObject(){
			$this->db->insertOneRow($this->table,$this->getArray());
		}
		protected function updateObject(){
			$this->db->updateRow($this->table,$this->modelName."_id",$this->id,$this->getArray());	
		}
		public function deleteSpec(){		
			$this->db->deleteAllRow('abiturient_ege_subject_connect',array('subject_id'=>$this->id));			
		}
		//--��������� ������ � ������
		public function setObject($data){
			$this->setName($data['subject_name']);	
			$this->setIcon($data['subject_icon']);				
		}
		public function getArray(){
			return array("subject_name"=>$this->subject_name,"subject_icon"=>$this->subject_icon);
		}		
	}
?>