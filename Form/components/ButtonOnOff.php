<?php
namespace Form\components;
use Form\ElementForm;

class ButtonOnOff extends ElementForm
{  
    protected $attrsExcessao = array();
    
    public function getElement(){ 
         
        if(!isset($this->value))
            $this->value = 'S';
            
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) {
             //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
        //return "<input type='button' ".$attrs."  >";
        if(isset($this->container)){
            return str_replace('%s','<div class="toggle-light" style="; margin-top: 35px 0 15px"  >  
                  <div>
                        <label style="position:absolute; width:100%; margin-top:-23px">'.$this->getLabel().'</label>
                        <input type="hidden" '.$attrs.' />
                        <div class="toggles" data-toggle-on="true" data-toggle-height="40" data-toggle-width="60" style="margin-top:25px"   ></div>
                        <div class="toggle on" data-toggle-id="statusloja" ></div>
                  </div>
                  </div>', $this->container);
        }else{
            return '<div class="toggle-light" style="margin:35px 0 15px"  >  
                  <div>
                        <label style="position:absolute; width:100%; margin-top:-23px">'.$this->getLabel().'</label>
                        <input type="hidden" '.$attrs.' />
                        <div class="toggles" data-toggle-on="true" data-toggle-height="40" data-toggle-width="60" style="margin-top:25px" ></div>
                        <div class="toggle on"  '.$attrs.' ></div>
                  </div> 
              </div>';
            
            
            //return  "<input type='button' ".$attrs."  >"; 
        }
    }
      
    
} 

 