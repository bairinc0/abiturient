<?php
	/*
	 * ���������� ������ ����������: ���������� $table (������� �� � ������� �������� ����������),
     *                                          $modelName (���������� �������, ������� ����� ����� ��������������� � �������)
	 * �������: 
     * insertObject() - ������� ������ ������� � ��
	 * updateObject() - ������ ������������ ������� �� ��
	 * setObject($data) - ���������� ������� �������,$data - ������������� ������ � ������� ��� ���������� �������.
	 * getArray() - ���������� ��� ������ ������� � ������������� ������ ������
	 * deleteSpec() - ������������ ��������, �������� �������� ������ ������.	 
	 * */
	abstract class DomainObject{
		protected $id;//������������� �������
		protected $author_id;//������������� ��������� �������		
		protected $db;//����������� � ���� ������
		protected $table="";//������� � ������� �������� �������� ���������� � DomainObject, ����������� � ����������� ������
		protected $modelName="";//��� ������ � ��, ����������� � ����������� ������ 
		public function __construct($db="",$id=0){
			$this->id=$id;		
			$this->db=$db;	
		}
		//-������� � �������
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}
		public function setAuthorId($author_id){
			$this->author_id=$author_id;
		}
		public function getAuthorId(){
			return $this->author_id;
		}
		public function setDB($db){
			$this->db=$db;
		}
		//-������� ������ � ����� ������
		//--����������� ������
		//---���������� �������� �� ��������� ������ ��������� �������
		protected abstract function insertObject();//������� ��� �������
		protected abstract function updateObject();//������� ��� ���������
		public function loadObject(){
			//�������� � ���� ������
			//���� ������ ����� �� �������� ������, ���� ��������� ������ �� �� �� ������
			
			if ($this->id==0){
				$this->insertObject();
			}
			else{				
				$this->updateObject();
			}
		}
		public function deleteObject(){
			$this->deleteSpec();
			$this->db->deleteAllRow($this->table,array($this->modelName."_id"=>$this->id));
		}
		public function deleteSpec(){
			//��������� �������� �������, �� ��������� ������ 
			//��� ������������� (�������� ��������� ���������� � �������� �����) ������������� � �����������			
		}
		//--��������� ������� �� ���� ������ �� id		
		public function getObject($id){
			if (isset($id)&&is_numeric($id)){
				//���������� ������ �� ���� �� ��������� id
				$this->id=$id;
				$data=$this->db->getAllRow($this->table,array($this->modelName."_id"=>$this->id));
				//������� ���������� ������ � ������� ����������� ����������
				$this->setObject($data[0]);
			}
		}
		//--��������� ��������� ��������
		//���������(������������): ������� � ��, �������, ��� ������
		//��������� (��������������): ������ ����������, ��� ������
		public static function getCollection($db,$table,$className,$data=false,$modelName=""){
			if ($modelName==""){//������ ��� ������ ������ ��������� � ������ �������
				$modelName=$table;			
			}			
			$data=$db->getAllRow($table,$data);	
			if (count($data)>0){
				$collection=new Collection($className);
				foreach($data as $elem){
									
					$obj=new ReflectionClass($className);
					$obj=$obj->newInstance();					
					$obj->setDB($db);
					$obj->setId($elem[$modelName."_id"]);
					
					$obj->setObject($elem); 
					$collection->add($obj);
				}	
				return $collection;
			}
			else{
				return false;
			}
		}
		//--��������� ������ �������� � �������
		public abstract function setObject($data);
		//--������ �� ������� ������������� ������
		public abstract function getArray();
		
	}
?>