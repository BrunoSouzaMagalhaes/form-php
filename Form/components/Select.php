<?php
namespace Form\components;
use Form\ElementForm;

class Select extends ElementForm
{  
    private $options = array(); 
    
    public function getElement(){  
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) { 
            //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
        $option = '';
        $cont = 0;
        foreach($this->options as $key=>$value){
             if(++$cont == 1)
                 $key = "";

            if(isset($this->value)){
                if($key == $this->value)
                    $option .= "<option selected='selected' value='".$key."'>$value</option>";
                else
                    $option .= "<option  value='".$key."'>$value</option>";
            }else{
                $option .= "<option  value='".$key."'>$value</option>";
            }
        }
        
         if(isset($this->container)){
            return sprintf($this->container,'<label>'.$this->getLabel().'</label>
                                            <select '.$attrs.'  class="'.$this->class.'"  >'.$option.'</select><br>');
        }else{

            return '<div class="form-group '.$this->classGrid.'">
                      <label>'.$this->getLabel().'</label>
                      <select '.$attrs.' class="'.$this->class.'"  >'.$option.'</select> 
                      <br> 
                    </div>';
        }
    }
    
    public function add($chave,$valor)
    {
        $this->options[$chave] = $valor; 
    }
    
    public function populaSelect($array,$selected)
    {
        $this->options =  array(SELECT);
        foreach($array as $key=>$value)
        {
            if($key == $selected)
                $this->add($key."'  selected '", $value);
             else
                $this->add($key,$value);   
        }
        return $this;
    }
    
} 

 