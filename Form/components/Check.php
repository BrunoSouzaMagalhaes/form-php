<?php
namespace Form\components;
use Form\ElementForm;

class Check extends ElementForm
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
            return sprintf($this->container,'<label>
                                            <input type="checkbox" class=" '.$this->class.'" '.$attrs.'>
                                            '.$this->getLabel().'</label>');
        }else{
            return '<div class="form-group checkbox">
                        <label>
                            <input type="checkbox" class="form-control '.$this->class.'" '.$attrs.'   >
                            '.$this->getLabel().'</label>
                    </div>'; 
        }          
    }      
} 

 