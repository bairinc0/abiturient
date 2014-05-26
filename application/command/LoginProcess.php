<?php
	class LoginProcess extends Command{
		public function publicPage(){
			return true;
		}
		public function getLocation(){
			return "LoginPage";
		}
		public function execute(){
			//получаем данные из формы
			$login=$_POST['login'];
			$password=md5($_POST['password']);
			//получаем подключение к БД
			$this->init=Init::initialize($this->siteRoot);
			$db=$this->init->getDB();
			if ($db->getNumRow('user',array('login'=>$login,'password'=>$password))>0){//проверяем существование комбинации логин/пароль
				//получаем данные пользователя из БД
				$userData=$db->getAllRow('user',array('login'=>$login,'password'=>$password));
				$userData=$userData[0];
				//пишем данные в сессию
				$auth=Auth::getAuth($this->siteRoot);
				$auth->setUser($userData);
				//посылаем в личный кабинет
				header("Location:".$this->siteRoot."/cabinet");
			}
			else{//неверно введена комбинация логин/пароль
				//Перекидываем на мейн
				header("Location:".$this->siteRoot."/?errLog=1");
			}					
		}
	}
?>