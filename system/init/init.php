<?php
	/*
	 *����� ���������� ������������� ��� ������� 
	 *������������� ���������� ����� ����������� ����� 
	 *Init::initialize($session,$smarty,$db,auth)
	 *����� ��������� ���� �������������� ��� ������� �������
	 */	
	class Init{
		private $registry;
		private $siteRoot;
		private $config;
		private $db;
		private $smarty;
		private $auth;
		private static $instance;
		private $command;
		private function __construct($siteRoot){
			$this->siteRoot=$siteRoot;
			
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/config/config.php");//SIC?
			$this->config=Config::getConfig($this->siteRoot);//�������� �������

			//�� ��������� ������, ������ � �� ����������
			$smarty=true;
			$session=true;
			$db=true;
			
			//�������� ��������� �������
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/router/router.php");	
			$url=Router::findCommand($this->siteRoot);			
			if ($url->smarty==1){
				$smarty=false;
			}
			if ($url->db==1){
				$db=false;
			}
			if ($url->session==1){
				$session=false;
			}			
			//� ���� �������
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/system/command/command.php');
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/command/".$url->command.".php");
			$className=(String)$url->command;
			$class = new ReflectionClass($className); 
			$this->command=$class->newInstance();
			//�������� �������
			//����� �������
			if (!($url->smarty==1)){
				if (!($url->onlyMainView==1)){//����� ����������� header � footer
					$this->command->setHeaderAndFooter($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/view/header.tpl",$_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/view/footer.tpl");	
				}				
				//����� ��� �� ������ ������ ����� ����� ������� ��������� � ���:
				/*
				  else if(....){
				  ....
				  }
				*/
				$this->command->setMain($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/application/view/".$url->view.".tpl");
			}
			//����������� ������			
			if ($session){
				ini_set(�magic_quotes_runtime�, 0);
				ini_set(�magic_quotes_sybase�, 0);	
				//ini_set("session.use_trans_sid",true);
				session_start();
				//print_r($_SESSION);
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/system/registry/registry.php');
				$this->registry=Registry::getRegistry();
			}
			//��������������� ����
			require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/system/auth/auth.php');
			$this->auth=Auth::getAuth($this->siteRoot);	
			//���������� �� ���� �����
			if($db){
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/system/db/db.php');
				$this->db=new DB($this->siteRoot);
			}
			//����������� Smarty
			if ($smarty){
				require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/assets/smarty/Smarty.class.php');
				$this->smarty = new Smarty();
				$this->smarty->template_dir = 'template/';
				$this->smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].$this->siteRoot.'/assets/smarty/templates_c/';
				$this->smarty->config_dir = $this->siteRoot.'/assets/smarty/configs/';
				$this->smarty->cache_dir = $this->siteRoot.'/assets/smarty/cache/';
				//��������� � ������� ������
				$this->command->setSmarty($this->smarty);
				$this->smarty->assign('site_root',$this->siteRoot);
				$this->smarty->assign('is_logged',$this->auth->is_logged());
				//��������� css �� ������ ������� (route.xml)
				if (isset($url->css)){//���� ����� ����������� css 
					$this->smarty->assign('css',$url->css.".css");
				}
				else{
					$this->smarty->assign('css',"main.css");
				}
				//���� ������ �� ��� ����?? � ��� � ��������������� ��������
				/*if ($this->auth->is_logged()){
					$user_id=$this->auth->getUser();
					$user_id=$user_id['user_id'];
					$name=$this->db->getAllRow('mtcss_user_info',array('user_id'=>$user_id));
					$name=$name[0]['user_secname']." ".$name[0]['user_name'];
					$this->smarty->assign('username',$name);
				}*/
			}
					
		}
		public function execute(){
			//��������� �������
			if (isset($this->command)){
				$this->command->doExecute($this->siteRoot);
			}
		}
		public static function initialize($siteRoot){
			if (empty(self::$instance)){
				self::$instance=new Init($siteRoot,$session,$smarty,$db);
			}
			return self::$instance;			
		}
		public function getRegistry(){
			return $this->registry;
		}
		public function getSiteRoot(){
			return $this->siteRoot;
		}
		public function getDB(){
			return $this->db;
		}
		public function getAuth(){
			return $this->auth;
		}
		public function getSmarty(){
			return $this->smarty;
		}
	}
?>