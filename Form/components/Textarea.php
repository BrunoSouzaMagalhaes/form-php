<?php
namespace Form\components;
use Form\ElementForm;

class Textarea extends ElementForm
{  
    public function getElement(){ 
         
        if(!isset($this->value))
            $this->value = '';
            
        $attrs = "";
        $atributos = get_object_vars($this);
                 
        $this->addAttrsExcessaoElement('value');
                
        foreach ($atributos as $nmatributo => $valor) {
             if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' "; 
        }
        
        
        if(isset($this->container)){ 
            return sprintf($this->container, '<label>'.$this->getLabel().'</label>
                                            <textarea class="form-control '.$this->class.'" '.$attrs.'   >'.$this->value.'</textarea>');
        }else{
            '<div class="form-group">
                <label>'.$this->getLabel().'</label>
                <textarea class="form-control '.$this->class.'" '.$attrs.'    >'.$this->value.'</textarea>
            </div>';
        }          
    }
} 

 