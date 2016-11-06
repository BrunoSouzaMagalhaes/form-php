<?php
namespace Form\components;
use Form\ElementForm;

class Botao extends ElementForm
{  
    protected $attrsExcessao = array();
  
    public function getElement(){ 
         
        if(!isset($this->value))
            $this->value = 'Enviar';
            
        $attrs = "";
        $atributos = get_object_vars($this);
        
        $this->addAttrsExcessaoElement('value');
        
        foreach ($atributos as $nmatributo => $valor) {
             //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
        //return "<input type='button' ".$attrs."  >";
        if(isset($this->container)){
            return str_replace('%s',"<button   ".$attrs." class=' ".$this->class."'  >".$this->value."</button>", $this->container);
        }else{
            return  "<button   ".$attrs." class=' ".$this->class."'  >".$this->value."</button>"; 
        }
    }
        
} 



 