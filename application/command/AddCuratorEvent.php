<?php	
	class AddCuratorEvent extends Command{
		function getLocation(){//функция для запрета запуска команд обработчиков форм
			return "addCuratorEventForm";
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
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/model/CuratorEvent.php");
			if (is_numeric($_POST['id'])&&($_POST['id']!=0)&&($this->init->getDB()->getNumRow('abiturient',array('abiturient_id'=>$_POST['id']))>0)){
				$event=new CuratorEvent($this->init->getDB());
				//какой режим работы
				if (is_numeric($_POST['curator_event_id'])&&($this->init->getDB()->getNumRow('abiturient_curator_events',array('curator_event_id'=>$_POST['curator_event_id']))>0)){
					//редактирование
					$event->getObject($_POST['curator_event_id']);	
					$event->setDescription($_POST['description']);
					$event->setType($_POST['type'.$_POST['curator_event_id']]);									
				}
				else{
					//создание					
					$event->setDescription($_POST['description']);	
					$event->setType($_POST['type']);
					$uploaddate=explode("-",$_POST['uploaddate']);
					//проверяем корректность ввода даты
					if (count($uploaddate)==3&&checkdate($uploaddate[1],$uploaddate[2],$uploaddate[0])){
						$event->setUploaddate($_POST['uploaddate']);	
					}
					else{
						$event->setUploaddate(date("Y-m-d"));
					}
					$userInfo=$this->init->getAuth()->getUser();
					$creator_id=$userInfo['user_id'];
					$event->setCreator($creator_id);
					$event->setAbiturient($_POST['id']);
				}				
				$event->loadObject();
				header("Location:".$this->siteRoot."/showCuratorEvents/?abiturient_id=".$event->getAbiturient());
				break;
			}
			else{
				//нужно выбросить Exception
			}
			header(Auth::getAuth($this->siteRoot)->defaultRedirect());			
												
		}
	}
?>