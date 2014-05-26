<?php
class Collection implements Iterator{
    protected $dofact;
    protected $total=0;    
    private $targetClass;
    private $pointer=0;
    private $objects=array();
    
    function __construct($targetClass=""){
       $this->targetClass=$targetClass;
    }    
    public function getQuantity(){
    	//возвращает количество элементов в коллекции
    	return $this->total;
    }
    function add(DomainObject $object){
        $class=$this->targetClass;
        if (! ($object instanceof $class)){
            throw new Exception ('Это не коллекция {$class}!');
        }
        
        $this->objects[$this->total]=$object;
        $this->total++;
    }   
    private function getRow($num){        
        if ($num>=$this->total){
            return null;
        }
        
        if (isset($this->objects[$num])){
            return $this->objects[$num];
        }
    }    
    public function rewind(){
        $this->pointer=0;
    }    
    public function current(){
        return $this->getRow($this->pointer);
    }    
    public function key(){
        return $this->pointer;
    }    
    public function next(){
        $row=$this->getRow($this->pointer);
        if ($row){
            $this->pointer++;
        }
        return $row;
    }    
    public function valid(){
        return(! is_null($this->current()));
    }
}
?>