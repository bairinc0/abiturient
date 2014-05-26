<?php
	//���������� ���� ��������� ��� ��������
	require_once($_SERVER['DOCUMENT_ROOT'].$this->siteRoot."/system/auth/AbiturientAccessManager.php");
	//��� �����
	abstract class AccessManager{
		//��������� �������
		protected $userTable="user";
		protected $userStatusTable="userstatus";
		protected $privelegiesTable="privelegies";
		//�������� ���������������� � �������� ������
		protected $objectTable="";
		protected $modelName="";
		//��������
		protected $user_id;
		protected $status_id;
		protected $init;
		protected $auth;
		protected $object_id=0;//0-��������
		public function __construct(Init $init){
			$auth=$init->getAuth();
			$user=$auth->getUser();
			$this->user_id=$user['user_id'];
			$this->status_id=$user['user_status'];
			$this->init=$init;
			$this->auth=$auth;
		}
		//�������
		public function getUserId(){
			return $this->user_id;
		}
		public function getUserStatus(){
			return $this->status_id;
		}
		//������� � �������
		public function getObjectId(){
			return $this->object_id;
		}
		public function setObjectId($object_id){
			$this->object_id=$object_id;
		}
		//-----
		public function callAuth(){//���������� ���� � auth
			$this->auth->setAccessManager($this);
		}
		public function getPrivelegies($module_id){//����������� ���� � �������� ������
			/* 0 - ������� ����
			 * 1 - ��������� ������ ����� ��������
			 * 2 - ��������� ����� ��������	
			 * 1 1 1 - � ������ 1, ������ 1, ����� ��� ���� 1 (��������� ������ ����� ��������)		 		 
			 * */
			if ($this->init->getDB()->getNumRow($privelegies,array("status_id"=>$this->status_id,"module_id"=>$module_id))>0){
				$privelegies=$this->init->getDB()->getAllRow($privelegies,array("status_id"=>$this->status_id,"object_type_id"=>$object_type_id));
				$privelegies=$privelegies[0]['grant'];
				return $privelegies;
			}
			else{
				return 0;//���� ����
			}			
		}
		public function objectOwner(){
			//������� ������� ������ �������, ����� 0 ���� ������� ����
			$objectID=$this->getObjectId();
			if ($this->init->getDB()->getNumRow($this->objectTable,array($this->modelName.'_id'=>$objectID))>0){
				$object_author=$this->init->getDB()->getAllRow($this->objectTable,array($this->modelName.'_id'=>$objectID));
				return $object_author[0]['author_id'];				
			}
			return 0;  
		}
		public function getDelegatedRights($objectID){//���������� �������������� ����� �� ������			
			/* 0 - ������� ����
			 * 1 - ���������
			 */
			return 0;
		}
	}
?>