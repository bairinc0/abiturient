<?php
	class LoginProcess extends Command{
		public function publicPage(){
			return true;
		}
		public function getLocation(){
			return "LoginPage";
		}
		public function execute(){
			//�������� ������ �� �����
			$login=$_POST['login'];
			$password=md5($_POST['password']);
			//�������� ����������� � ��
			$this->init=Init::initialize($this->siteRoot);
			$db=$this->init->getDB();
			if ($db->getNumRow('user',array('login'=>$login,'password'=>$password))>0){//��������� ������������� ���������� �����/������
				//�������� ������ ������������ �� ��
				$userData=$db->getAllRow('user',array('login'=>$login,'password'=>$password));
				$userData=$userData[0];
				//����� ������ � ������
				$auth=Auth::getAuth($this->siteRoot);
				$auth->setUser($userData);
				//�������� � ������ �������
				header("Location:".$this->siteRoot."/cabinet");
			}
			else{//������� ������� ���������� �����/������
				//������������ �� ����
				header("Location:".$this->siteRoot."/?errLog=1");
			}					
		}
	}
?>