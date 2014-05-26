<?php
	/*
	 * ����������� ����� �������. ������� �������. ��������� �����
	 * */
	abstract class Command{
		protected $smarty=false;
		protected $siteRoot;
		protected $init;
		//������ ������� �������
		private $header=false;
		private $footer=false;
		private $main;
		//��������� �����
		function doExecute($siteRoot){
			$this->siteRoot=$siteRoot;
			//��������� �������������			
			$this->init=Init::initialize($this->siteRoot);
			if ($this->getAuth()){//�������� ������ ������� � �������
				//��������� �������
				//���������� ��������� ����� ������� - DomainObject
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/model/DomainObject.php");//SIC?
				$this->execute();
				//������� ������� ���� ������ ���������
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
				//������������ �� ������ ���� �� ������ �����������				
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
			//��������� ��� ������ ������ �����					
			if (($this->getLocation()!="")&& ($this->getLocation()!=$_POST['Location'])){				
				return false;
			}
			//�����������
			if ($this->publicPage()){//�� ����� ����������� ��� �������
				return true;
			}
			//��������� ��� ������� �������������
			if (Auth::getAuth($this->siteRoot)->is_logged()){					
				//������������ �����������, ����� �� ��������� ������ � ������� � ������� �������� �������
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/auth/AccessManager.php");
				if ($this->objectData()){//��������� ��� ������� ����� ������ � ������� �������
					//return true;															
					if (Auth::getAuth($this->siteRoot)->objectOwner()){
						return true;
					}	
					return false;
				}
				else{//����� ������� � ������� ��������� �� ����!
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
		
		function publicPage(){//������� ����� ���� �������������� ���� �� ����� ������ ��������� ������ � �������
			return false;
		}
		function getLocation(){//������� ��� ������� ������� ������ ������������ ����
			return "";
		}
		//�����������		
		function objectData(){
			//����� �������������� ������� ���� ����� �������� �� ������ � ������� � ������� �������� �������� ������������  
			return false;
		}
	}
?>