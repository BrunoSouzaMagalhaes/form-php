<?php
namespace Form\components;
use Form\ElementForm;

class UploadImage extends ElementForm
{       
     public function getElement(){ 
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) {
            //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
      
        if(!isset($this->label))
            $this->setLabel('Anexo');
                  
        if(isset($this->container)){ 
            return sprintf($this->container,' <div class="container-upload">      
                                                <div class="btn btn-default btn-file"> 
                                                    <i class="fa fa-paperclip"></i> 
                                                    '.$this->getLabel().' 
                                                    <input type="file" class="input-file '.$this->class.'" '.$attrs.'  >
                                                </div>
                                                <div class="imagens row"  >  
                                                     <div style="display:none">
                                                        <p class="col-xs-6 col-md-3 thumbnail colorbox"  href="#"> 
                                                               <img src="#" alt="imagem"> 
                                                        </p>
                                                        <button type="button" class="btn btn-danger">Excluir</button>
                                                      </div>   
                                                </div> 
                                            </div> ');
        }else{
            return ' <div class="container-upload">
                      <div class="btn btn-default btn-file">
    					  <i class="fa fa-paperclip"></i> 
                          '.$this->getLabel().' 
                          <input type="file" class="input-file '.$this->class.'" '.$attrs.'  >
				      </div> 
                       
                     <div class="imagens row"  >    
                         
                          <div style="display:none">
                                <p class="col-xs-6 col-md-3 thumbnail colorbox"  href="#"> 
                                       <img src="#" alt="imagem"> 
                                </p>
                                 <button type="button" class="btn btn-danger">Excluir</button>
                          </div>  
                           
                    </div>  
                      
                      
                    </div>'; 
        } 
    }       
} 

 