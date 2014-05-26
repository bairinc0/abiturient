<?php	
	class AddCuratorEventForm extends Command{
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
			if (isset($_GET['user_id'])&&is_numeric($_GET['user_id'])&&($_GET['user_id']!=0)){//проверим что из GET пришёл валидный идентификатор абитуриента
				$this->smarty->assign('abiturient_id',$_GET['user_id']);			
			}
			else{
				header(Auth::getAuth($this->siteRoot)->defaultRedirect());
			}			
		}

	}
?>