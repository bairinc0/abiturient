<?php
	/*
	 * Класс Auth - авторизация, доступ пользователя к команде
	 * Шаблон - Синглтон/Фасад
	 * */
	class Auth{		
		private static $instance;
		private $userInfo;
		private $registry;
		private $siteRoot;	
		private $accessManager=false;
		public function setAccessManager(AccessManager $manager){
			$this->accessManager=$manager;
		}	
		private function __construct($siteRoot){
			require_once($_SERVER['DOCUMENT_ROOT'].$siteRoot.'/system/registry/registry.php');			
			$this->siteRoot=$siteRoot;
			$this->registry=Registry::getRegistry();
			$this->userInfo['is_logged']=$this->registry->getValue("is_logged");
			$this->userInfo['user_status']=$this->registry->getValue("user_status");				
			$this->userInfo['user_id']=$this->registry->getValue("user_id");			
		}
		private function getSiteName(){
			//получаем имя сайта из конфига
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/system/config/config.php');
			$config=Config::getConfig($this->siteRoot);
			if ($config->getValue("configLoaded")){
				$sitename=$config->getValue("sitename");
			}
			else{
				//не загружен конфиг
				$sitename="unknownresourse";
			}
			return $sitename;
		}
		public function is_logged(){				
			if (($this->registry->getValue('site_name')==$this->getSiteName())&&($this->userInfo['is_logged'])){								
				return true;
			}
			else{
				return false;
			}
		}
		public function access($module_id){
			//по номеру модуля 0 - для всех/1 - только админы и статусу текущего юзера доступ к команде
			if ($this->is_logged()){
				switch ($this->userInfo['user_status']){
					case 1://Обычный юзер
						if ($module_id==0){
							return true;
						}
						else{
							return false;
						}
					break;
					case 2://Админ
						return true;						
					break;
				}
				
			}
		}
		public function objectOwner(){
			//ЗАПЛАТКА. ПРОВЕРЯЕТ СЛУЧАЙ КОГДА ПОЛЬЗОВАТЕЛЬ ИМЕЕТ ТОЛЬКО СВОЙ ОБЪЕКТ
			if ($this->accessManager instanceof AccessManager){//проверяем что у нас задан AccessManager
				//ЗДЕСЬ ДРУГИЕ УСЛОВИЯ ПРОВЕРКИ!!!!
				if (($this->accessManager->objectOwner()==0)||($this->accessManager->objectOwner()==$this->userInfo['user_id'])){
					return true;
				}
				return false;
			}
			else{
				return false;
			}
						
		}
		public function accessRigths($module_id){
			if (!$this->access($module_id)){				 				
				header("Location:".$this->siteRoot);
			}
		}
		public function setUser($user){			
			$this->registry->setValue('is_logged',true);
			$this->registry->setValue('user_status',$user['statusid']);	
			$this->registry->setValue('site_name',$this->getSiteName());
			$this->registry->setValue('user_id',$user['id']);
		}
		public function getUser(){
			return $this->userInfo;
		}
		public function logOut(){//выход из системы
			$_SESSION['user_id']=-1;
			$_SESSION['user_login']="";	
			$_SESSION['user_status']=-1;				
			$_SESSION['is_logged']=false;
			$_SESSION['site_name']='unknownportal';
		}
		public static function getAuth($siteRoot){
			if (empty(self::$instance)){
				self::$instance=new Auth($siteRoot);
			}
			return self::$instance;
		}
		public function defaultRedirect(){
			if ($this->is_logged()){
				return "Location:".$this->siteRoot."/cabinet";
			}
			else{
				return "Location:".$this->siteRoot;
			}
		}
	}	 		
?>