<?php
	/*
	 * Абстрактный класс Команда. Паттерн Команда. Шаблонный метод
	 * */
	abstract class Command{
		protected $smarty=false;
		protected $siteRoot;
		protected $init;
		//данные шаблона дизайна
		private $header=false;
		private $footer=false;
		private $main;
		//шаблонный метод
		function doExecute($siteRoot){
			$this->siteRoot=$siteRoot;
			//подрубаем инициализатор			
			$this->init=Init::initialize($this->siteRoot);
			if ($this->getAuth()){//проверка уровня доступа к команде
				//исполняем команду
				//подключаем дефолтный класс моделей - DomainObject
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/model/DomainObject.php");//SIC?
				$this->execute();
				//выводим шаблоны если смарти подключен
				if ($this->smarty){
					if ($this->header){
						$this->smarty->display($this->header);
					}
					$this->smarty->display($this->main);
					if ($this->footer){
						$this->smarty->display($this->footer);
					}
				}
				
			}
			else{
				//перекидываем на дефолт если не прошёл регистрацию				
				header(Auth::getAuth($this->siteRoot)->defaultRedirect());
			}
		}
		function setSmarty(Smarty $smarty){
			$this->smarty=$smarty;
		}
		function setHeaderAndFooter($header,$footer){
			$this->header=$header;	 
			$this->footer=$footer;
		}
		function getAuth(){			
			//проверяем что пришёл откуда нужно					
			if (($this->getLocation()!="")&& ($this->getLocation()!=$_POST['Location'])){				
				return false;
			}
			//авторизация
			if ($this->publicPage()){//не нужна авторизация для команды
				return true;
			}
			//проверяем что человек авторизовался
			if (Auth::getAuth($this->siteRoot)->is_logged()){					
				//пользователь авторизован, нужно ли проверять доступ к объекту с которым работает команда
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/auth/AccessManager.php");
				if ($this->objectData()){//проверяем что человек имеет доступ к данному объекту
					//return true;															
					if (Auth::getAuth($this->siteRoot)->objectOwner()){
						return true;
					}	
					return false;
				}
				else{//права доступа к объекту проверять не надо!
					return true;
				}				
			}
			else{
				
				return false;
			}		
					
		}
		function setMain($main){
			$this->main=$main;
		}
		abstract function execute();
		
		function publicPage(){//функция может быть переопределена если не нужно вообще проверять доступ к команде
			return false;
		}
		function getLocation(){//функция для запрета запуска команд обработчиков форм
			return "";
		}
		//авторизация		
		function objectData(){
			//нужно переопределить функцию если нужна проверка на доступ к объекту с которым пытается работать пользователь  
			return false;
		}
	}
?>