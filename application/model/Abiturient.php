<?php
	//���������� ������ ������� �� ����������
	require_once("Event.php");
	require_once("EGESubject.php");
	require_once("School.php");
   //	require_once("Document.php");
	class Abiturient extends DomainObject{
		//���������� ��������� �������
		protected $table="abiturient";
		protected $modelName="abiturient";
		//���������� ��������
		private $firstName="";
		private $secondName="";
		private $patronymic="";
		private $phoneNumber="";
		private $class="";
		private $adress="";
		private $school;
		private $ege=false;
		private $events=false;
        private $document="";
        
		//- ������� � �������
		public function setFirstName($firstName){
			$this->firstName=$firstName;
		}
		public function setSecondName($secondName){
			$this->secondName=$secondName;
		} 
		public function setPatronymic($patronymic){
			$this->patronymic=$patronymic;
		} 
		public function getFirstName(){
			return $this->firstName;
		}
		public function getSecondName(){
			return $this->secondName;
		} 
		public function getPatronymic(){
			return $this->patronymic;
		} 
		public function setPhone($phone){
			$this->phoneNumber=$phone;
		}
		public function getPhone(){
			return $this->phoneNumber;
		}
		public function setClass($class){
			$this->class=$class;
		}
		public function getClass(){
			return $this->class;
		}
		public function setAdress($adress){
			$this->adress=$adress;
		}
		public function getAdress(){
			return $this->adress;
		}
		public function setSchool(School $school){
			$this->school=$school;
		}
		public function getSchool(){
			return $this->school;
		}
		public function setEGE(Collection $ege){
			$this->ege=$ege;	
		}
		public function getEGE(){
			return $this->ege;
		}
		public function setDoc($doc){
			$this->doc=$doc;	
		}
		public function getDoc(){
			return $this->doc;
		}
		public function setEvents(Collection $events){
			$this->events=$events;	
		}
		public function getEvents(){
			return $this->events;
		}
		//-������ � ��
		//��������������� ������� - ������� ���
		private function insertEGE($abiturient_id){
			if ($this->getEGE()->getQuantity()>0){//���������, ��� ���� ��� ���������				
				foreach($this->getEGE() as $ege){
					$this->db->insertOneRow('abiturient_ege_subject_connect',array('abiturient_id'=>$abiturient_id,'subject_id'=>$ege->getId(),'mark'=>$ege->getMark()));
				}
			}
		}
		/* /��������������� ������� - ������� ����� ^^
		private function insertDoc($document_id){
			if ($this->getDoc()->getQuantity()>0){//���������, ��� ���� ��� ���������				
				foreach($this->getDoc() as $doc){
					$this->db->insertOneRow('abiturient_documents_connect',array('abiturient_id'=>$abiturient_id,'document_id'=>$doc->getId()));
				}
			}
		}  */      
		//��������������� ������� - ������� ������� (�����������)
		private function insertEvents($abiturient_id){
			if ($this->getEvents()->getQuantity()>0){//���������, ��� ���� ��� ���������				
				foreach($this->getEvents() as $event){
					$this->db->insertOneRow('abiturient_event_connect',array('abiturient_id'=>$abiturient_id,'event_id'=>$event->getId()));
				}
			}
		}
		protected function insertObject(){
			//��������� �������� ����			
			$this->db->insertOneRow($this->table,$this->getArray());
			//��������� ���
			$abiturient_id=$this->db->getDBH()->lastInsertId();//�������� id �����������
			$this->insertEGE($abiturient_id);
			//��������� �������
			$this->insertEvents($abiturient_id);
		}
		protected function updateObject(){
			//�������� �������� ����			
			$this->db->updateRow($this->table,$this->modelName."_id",$this->getId(),$this->getArray());
			//����� �������� ���������� � ��������� ���	
			//��������� ������� ������ � ���������� ���
			$this->db->deleteAllRow('abiturient_ege_subject_connect',array('abiturient_id'=>$this->id));
			//��������� ���
			$this->insertEGE($this->getId());
			//��������� ���� ^^
		//	$this->insertDoc($this->getId());
			//��������� ������� ������ � ��������
			$this->db->deleteAllRow('abiturient_event_connect',array('abiturient_id'=>$this->id));
			//��������� �������
			$this->insertEvents($this->getId());			
		}
		public function deleteSpec(){		
			//��������� ������� ������ � ���������� ���			
			$this->db->deleteAllRow('abiturient_ege_subject_connect',array('abiturient_id'=>$this->id));	
			//��������� ������� ������ � ����������� ^^		
			$this->db->deleteAllRow('abiturient_documents_connect',array('abiturient_id'=>$this->id));            
			//��������� ������� ������ � ��������
			$this->db->deleteAllRow('abiturient_event_connect',array('abiturient_id'=>$this->id));
			//������� ����������� �������		
			$this->db->deleteAllRow('abiturient_curator_events',array('abiturient_id'=>$this->id));
		}
		//--��������� ������ � ������ ����������
		public function setObject($data){
			$this->setFirstName($data['name']);
			$this->setSecondName($data['second_name']);
			$this->setPatronymic($data['patronymic']);
			$this->setPhone($data['phone_number']);
			$this->setClass($data['class']);
			$this->setAdress($data['adress']);
			$this->setAuthorId($data['author_id']);
            // ^^ ������ ����
			$this->setDoc($data['document']);
			//����� �����
			$school=new School($this->db);
			$school->getObject($data['school_id']);
			$this->setSchool($school);	
			//����� ������ ���
			if ($this->db->getNumRow('abiturient_ege_subject_connect',array('abiturient_id'=>$this->getId()))>0){
				$egeCollection=new Collection("EGESubject");
				$data=$this->db->getAllRow('abiturient_ege_subject_connect',array('abiturient_id'=>$this->getId()));
				foreach($data as $elem){
					$item=new EGESubject($this->db);
					$item->getObject($elem['subject_id']);
					$item->setMark($elem['mark']);
					$egeCollection->add($item);	
				}
				$this->setEGE($egeCollection);
			}
			//����� ������ �����������		
			if ($this->db->getNumRow('abiturient_event_connect',array('abiturient_id'=>$this->getId()))>0){
				$eventCollection=new Collection("Event");
				$data=$this->db->getAllRow('abiturient_event_connect',array('abiturient_id'=>$this->getId()));
				foreach($data as $elem){
					$item=new Event($this->db);
					$item->getObject($elem['event_id']);					
					$eventCollection->add($item);	
				}
				$this->setEvents($eventCollection);
			}	
		}
		public function getArray(){
			return array("second_name"=>$this->getSecondName(),"name"=>$this->getFirstName(),"patronymic"=>$this->getPatronymic(),"phone_number"=>$this->getPhone(),"class"=>$this->getClass(),"adress"=>$this->getAdress(),"school_id"=>$this->getSchool()->getId(),"author_id"=>$this->getAuthorId(),"document"=>$this->getDoc());
		}			
	}
?>