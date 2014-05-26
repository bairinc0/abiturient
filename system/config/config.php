<?php
	/*
	 * ����� �������� ������ �� ����� ������������:
	 * * ����������� � ���� ������
	 * * �������� �����
	 * ������: Singleton
	 * */
	class Config{
		private $parameters=array();
		private static $instance;
		private function __construct($rootFolder){			
			//������������ �� ���� ������� ���������� �����
			$filename=$_SERVER['DOCUMENT_ROOT'].$rootFolder."/config/config.xml";
			if (file_exists($filename)){
				try{
					$configure=simplexml_load_file($filename);
					$this->parameters['dbname']=(String)$configure->db->dbname;			
					$this->parameters['host']=(String)$configure->db->host;
					$this->parameters['user']=(String)$configure->db->user;
					$this->parameters['pass']=(String)$configure->db->pass;
					$this->parameters['sitename']=(String)$configure->authinfo->sitename;
					$this->parameters['configLoaded']=true;
				}
				catch(Exception $e){
					//����� ��� - ������ ������ � xml ������
					$this->parameters['configLoaded']=false;
				}	
			}
			else{
				//����� ��� - ���� �� ����������
				$this->parameters['configLoaded']=false;
			}						
		}
		public function getValue($attr){
			return $this->parameters[$attr];
		}
		public static function getConfig($rootFolder="folderNotDefined"){			
			if (empty(self::$instance)){
				self::$instance=new Config($rootFolder);
			}
			if (!empty(self::$instance)&&($rootFolder==="folderNotDefined")){
				//LogFileWrite
				throw new Exception("Error using config class");				
			}
			return self::$instance;
		}
	}
?>