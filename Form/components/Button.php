<?php
namespace Form\components;
use Form\ElementForm;

class Button extends ElementForm
{  
    protected $attrsExcessao = array();
    
    public function getElement(){ 
         
        if(!isset($this->value))
            $this->value = 'Enviar';
            
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) {
             //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
        //return "<input type='button' ".$attrs."  >";
        if(isset($this->container)){
            return str_replace('%s',"<input type='button' class='  ".$this->class."'  ".$attrs."  >", $this->container);
        }else{
            return  "<input type='button' ".$attrs." class=' ".$this->class."'  >"; 
        }
    }
      
    
} 

 