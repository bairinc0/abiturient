<?php	
	class ShowCabinet extends Command{
		public function execute(){			
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/model/Abiturient.php");
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/model/Collection.php");			
			$userInfo=$this->init->getAuth()->getUser();	
					
			$collection=Abiturient::getCollection(Init::initialize($this->siteRoot)->getDB(),"abiturient","Abiturient",array('author_id'=>$userInfo['user_id']));
			
			if ($collection instanceof Collection && $collection->getQuantity()>0){				
				$data=array();
				foreach($collection as $abit){
					//показываем ≈√Ё
					$ege=array();
					if ($abit->getEGE()){
						foreach	($abit->getEGE() as $elem){
							array_push($ege,$elem->getArray());
						}				
					}
					$events=array();
					if ($abit->getEvents()){
						foreach	($abit->getEvents() as $elem){
							array_push($events,$elem->getArray());
						}
					}					
					array_push($data,array("id"=>$abit->getId(),"second_name"=>$abit->getSecondName(),"name"=>$abit->getFirstName(),"patronymic"=>$abit->getPatronymic()
					,"phone_number"=>$abit->getPhone(),"class"=>$abit->getClass(),"document"=>$abit->getDoc(),"adress"=>$abit->getAdress(),"school"=>$abit->getSchool()->getName(),"region"=>$abit->getSchool()->getRegion()->getName(),'ege'=>$ege,'events'=>$events,'curator_events'=>$this->init->getDb()->getNumRow('abiturient_curator_events',array('abiturient_id'=>$abit->getId()))));
				}			
				$this->smarty->assign("data",$data);
			}		
		}
	}
?>