<?php
	/*
	 * Наследники должны определить: переменные $table (таблица БД в которой хранится информация),
     *                                          $modelName (фактически префикс, который стоит перед идентификатором в таблице)
	 * Функции: 
     * insertObject() - вставка нового объекта в БД
	 * updateObject() - апдейт загруженного объекта из БД
	 * setObject($data) - заполнение объекта данными,$data - ассоциативный массив с данными для заполнения объекта.
	 * getArray() - запихиваем все данные объекта в ассоциативный массив массив
	 * deleteSpec() - спецификация удаления, например удаление таблиц связей.	 
	 * */
	abstract class DomainObject{
		protected $id;//идентификатор объекта
		protected $author_id;//идентификатор создателя объекта		
		protected $db;//подключение к базе данных
		protected $table="";//таблица в которой хранится основная информация о DomainObject, прописываем в производном классе
		protected $modelName="";//для работы с БД, прописываем в производном классе 
		public function __construct($db="",$id=0){
			$this->id=$id;		
			$this->db=$db;	
		}
		//-Сеттеры и геттеры
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
		//-Функции работы с базой данных
		//--измененение данных
		//---конкретные операции по изменению данных реализуют потомки
		protected abstract function insertObject();//функция для инсерта
		protected abstract function updateObject();//функция для изменения
		public function loadObject(){
			//загрузка в базу данных
			//если объект новый то запустит инсерт, если изменялся объект из БД то апдейт
			
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
			//специфика удаления объекта, по умолчанию пустая 
			//при необходимости (например подчистка информации в таблицах связи) перегружается в наследниках			
		}
		//--получение объекта из базы данных по id		
		public function getObject($id){
			if (isset($id)&&is_numeric($id)){
				//подгружаем объект из базы по заданному id
				$this->id=$id;
				$data=$this->db->getAllRow($this->table,array($this->modelName."_id"=>$this->id));
				//передаём полученный массив в функцию наполняющую наследника
				$this->setObject($data[0]);
			}
		}
		//--получение коллекции объектов
		//параметры(обязательные): коннект к бд, таблица, имя класса
		//параметры (необязательные): массив параметров, имя модели
		public static function getCollection($db,$table,$className,$data=false,$modelName=""){
			if ($modelName==""){//обычно имя модели должно совпадать с именем таблицы
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
		//--наполняем объект массивом в потомке
		public abstract function setObject($data);
		//--Делаем из объекта ассоциативный массив
		public abstract function getArray();
		
	}
?>