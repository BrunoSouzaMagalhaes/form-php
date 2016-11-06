<?php
namespace Form;
abstract class ElementForm
{ 
    protected $class=" ";
    protected $classGrid="";
    protected $attrsExcessaoDefault = array('container','attrsExcessao','attrsExcessaoDefault','options','attrsExcessaoElement' ); //Não permite o objeto de formulario entender como um atributo, são variáveis internas
    protected $attrsExcessaoElement = array('classGrid','class','label' );  //Não permite inserir como atributo no elemento
    
    public function __construct($name)
    {
        $this->name = $name;  
        $this->id = $name;       
    }
    
    protected function getAttrsExcessao(){
        return $this->attrsExcessaoDefault;
    } 
    
    protected function getAttrsExcessaoElement(){
        return $this->attrsExcessaoElement;
    }
    
    protected function addAttrsExcessaoElement($elemento){
        return array_push($this->attrsExcessaoElement, $elemento);
    }
    
    public function addClass($class){
        $this->class .= " $class";
        return $this;
    }
        
    public function getAttrib($attrib){
        return $this->$attrib;
    }
        
    public function setAttr($atributo,$valor=false){
        if(is_array($atributo) && !empty($atributo))
        {
            if(count($atributo) == 1){
                $indice = key($atributo);
                $this->$indice = $atributo[$indice];
            }else{
                foreach($atributo as $key=>$value){ 
                     $this->$key = $value; 
                }
            }
        }else if(!empty($atributo) && !empty($valor)){
            $this->$atributo = $valor;
        }
        return $this;
    }
    
    public function setAttrs($array){
        if(is_array($array) && !empty($array))
        {
            if(count($array) == 1){
                $indice = key($array);
                $this->$indice = $array[$indice];
            }else{ 
                foreach($array as $key=>$value){ 
                     $this->$key = $value; 
                }
            } 
        }
        return $this;
    }
    
    
    public function setValue($value){
       $this->value = $value;
       return $this;
    }
    
    public function removeAttr($attr)
    {
        unset($this->$attr);
        return $this;
    }
        
    public function setContainer($container){
        $this->container = $container;
        return $this;
    }
    
    public function setLabel($nmcampo){
        $this->label = $nmcampo;
        return $this;
    }
    
    public function getLabel(){
        if(isset($this->label))
            return $this->label;
        else    
            return false;
    }

    public function addClassGrid($class)
    {
        $this->classGrid .= " $class";
        return $this;
    }
} 

 