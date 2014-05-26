<?php	
	class AddAbiturient extends Command{
		function getLocation(){//������� ��� ������� ������� ������ ������������ ����
			return "addAbiturientForm";
		}
		public function objectData(){
			$manager=new AbiturientAccessManager($this->init);
			$user_id=$_GET['user_id'];
			if (!is_numeric($user)){
				$user_id=0;
			}
			$manager->setObjectId($user_id);
			$manager->callAuth();
			return true;
		}
		public function execute(){			
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/model/Abiturient.php");
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/model/Collection.php");					
			$abiturient=new Abiturient($this->init->getDB());	
			//��� ������� �� ������ ������
			if ($_POST['id']==0){
				$userInfo=$this->init->getAuth()->getUser();
				$author_id=$userInfo['user_id'];				
			}	
			else{
				$abiturient->getObject($_POST['id']);
				$author_id=$abiturient->getAuthorId();
			}
			$abiturient->setObject($_POST);//��������� ������� �� POST ������ 
			$abiturient->setId($_POST['id']);//����� �������������
			$abiturient->setAuthorId($author_id);//����� ������
			//��������� ������ �� ���
			$ege=new Collection("EGESubject");
			if ($_POST['fiz']){
				$there_is_no_ege=false;
				$subject=new EGESubject($this->init->getDB());
				$subject->getObject(1);//������ ������
				$ege->add($subject);	
			}
			if ($_POST['math']){
				$there_is_no_ege=false;
				$subject=new EGESubject($this->init->getDB());
				$subject->getObject(2);//������ ����������
				$ege->add($subject);	
			}
         
// �������� ���� ��� ������ ��� �� �����  
            if ($_POST['document']){
                $abiturient->setDoc(1);
            }
            else {
                $abiturient->setDoc(0);
            }
                

 
			$abiturient->setEGE($ege);				
			//������
			$events=new Collection("Event");
			$events_form=$this->init->getDB()->getAllRow('abiturient_events');
			foreach ($events_form as $event){
				if ($_POST['event'.$event['event_id']]){
					$event_obj=new Event($this->init->getDB());
					$event_obj->getObject($event['event_id']);//������ �������					
					$events->add($event_obj);
				}
			}			
			$abiturient->setEvents($events);			
			//��������� ������ � ��				
			$abiturient->loadObject();			
			header(Auth::getAuth($this->siteRoot)->defaultRedirect());			
		}
	}
?>