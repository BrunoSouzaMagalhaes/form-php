<?php
namespace Form\components;
use Form\ElementForm;

class Password extends ElementForm
{   
     public function getElement(){ 
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) {
            //Remove todos atributos de configura��o e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
         if(isset($this->container)){ 
            return sprintf($this->container,'<label>'.$this->getLabel().'</label>
                                            <input type="password" class="form-control '.$this->class.'" '.$attrs.'  title="'.$this->getLabel().'" >');
        }else{
            return '<div class="form-group '.$this->classGrid.'">
                        <label>'.$this->getLabel().'</label>
                        <input type="password" class="form-control '.$this->class.'" '.$attrs.'   title="'.$this->getLabel().'" >
                    </div>'; 
        } 
        
        /*
        if(isset($this->container)){ 
            return sprintf($this->container,'<input type="text" class="form-control '.$this->class.'" '.$attrs.' data-toggle="tooltip" data-placement="left" title="'.$this->getLabel().'" >');
        }else{
            return '<div class="form-group">
                      <input type="text" class="form-control '.$this->class.'" '.$attrs.'   data-toggle="tooltip" data-placement="left" title="'.$this->getLabel().'" >
                    </div>'; 
        } 
        */
        
    }
     
      
} 

 