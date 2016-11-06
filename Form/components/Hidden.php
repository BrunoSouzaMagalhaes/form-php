<?php
namespace Form\components;
use Form\ElementForm;

class Hidden extends ElementForm
{   
     public function getElement(){ 
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) {
            //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
      
        if(isset($this->container)){ 
            return sprintf($this->container,'<input type="hidden" class="form-control '.$this->class.'" '.$attrs.'    title="'.$this->getLabel().'" >');
        }else{
            return '<input type="hidden" class="'.$this->class.'" '.$attrs.'    >'; 
        } 
    }
    
   
      
      
} 

 