<?php	
	class AddAbiturientForm extends Command{
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
			if (isset($_GET['user_id'])&&is_numeric($_GET['user_id'])&&$this->init->getDB()->getNumRow('abiturient',array('abiturient_id'=>$_GET['user_id']))>0){//проверим что из GET пришЄл валидный идентификатор абитуриента
				//режим редактировани€

				$id=$_GET['user_id'];				
				$abit=new Abiturient($this->init->getDB());
				$abit->getObject($id);
				$this->smarty->assign("data",$abit->getArray());
				//предметы ≈√Ё
				$data=false;
				if ($abit->getEGE()){//если есть какой нибудь объект
					$data=array();
					foreach($abit->getEGE() as $ege){
						$data[$ege->getId()]=true;
					}
				}				
				$this->smarty->assign("ege",$data);				
			}
			else{
				//режим создани€ нового пользовател€				
				$id=0;
			}		
			//событи€
			//дЄргаем список событий
			$data=array();
			$events=Event::getCollection($this->init->getDB(),"abiturient_events","Event",false,"event");				
			foreach($events as $event){
				$flag=false;					
				if ($id!=0&&$this->init->getDB()->getNumRow('abiturient_event_connect',array('event_id'=>$event->getId(),'abiturient_id'=>$abit->getId()))>0){//человек учавствовал в событии
					$flag=true;
				}
				array_push($data,array('event_id'=>$event->getId(),'event_name'=>$event->getName(),'event_icon'=>$event->getIcon(),'checked'=>$flag));
			}			
			$this->smarty->assign("events",$data);	
			//дЄргаем список школ
			$schools=School::getCollection($this->init->getDB(),"abiturient_school","School",false,"school");
			$data=array();
			foreach($schools as $school){				
				array_push($data,array("id"=>$school->getId(),"school_name"=>$school->getName(),"region_name"=>$school->getRegion()->getName()));
			}			
			$this->smarty->assign("schools",$data);
			$this->smarty->assign("abiturient_id",$id);			
		}

	}
?>