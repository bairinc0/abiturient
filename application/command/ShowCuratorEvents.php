<?php	
	class ShowCuratorEvents extends Command{
		public function execute(){			
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/model/Abiturient.php");
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/model/CuratorEvent.php");
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/model/Collection.php");			
			if (is_numeric($_GET['abiturient_id'])&&$this->init->getDB()->getNumRow('abiturient',array('abiturient_id'=>$_GET['abiturient_id']))>0){
				//данные абитуриента
				$abit=new Abiturient($this->init->getDb());
				$abit->getObject($_GET['abiturient_id']);
				$this->smarty->assign("abiturient",$abit->getArray());
				//берём все события
				$collection=CuratorEvent::getCollection(Init::initialize($this->siteRoot)->getDB(),"abiturient_curator_events","CuratorEvent",array('abiturient_id'=>$_GET['abiturient_id']),"curator_event");
				$data=array();
				if ($collection instanceof Collection && $collection->getQuantity()>0){				
					foreach($collection as $event){
						//кто создал
						$creator=$this->init->getDB()->getAllRow('user',array('id'=>$event->getCreator()));
						//наполняем массив
						array_push($data,array("curator_event_id"=>$event->getId(),"abiturient"=>$event->getAbiturient(),"description"=>$event->getDescription(),"type"=>$event->getType(),"uploaddate"=>$event->getUploaddate(),"creator"=>$creator[0]["login"]));
					}					
				}	
				$this->smarty->assign("data",$data);	
			}
			else{
				header(Auth::getAuth($this->siteRoot)->defaultRedirect());
			}
		}
	}
?>