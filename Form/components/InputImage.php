<?php
namespace Form\components;
use Form\ElementForm;

class InputImage extends ElementForm
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
        
        if(isset($this->container)){
            return str_replace('%s','<label class="block">
                                <div class="cartao-imagem no-placeholder">
                                    <div id="imagem-preview" class="img-cover img-rounded" style="background: url(\''.DIR_SEM_IMAGEM .'\') no-repeat 0 0 /cover; height: 250px;"></div>
                                    <div class="photo-upload-label">
                                        <p class="text-center"><i class="fa fa-camera"></i> Selecione a imagem</p>
                                    </div>
                                </div>
                                <input type="file" class="hidden cover-photo" name="imagem" id="imagem-principal"  >
                            </label>', $this->container);
        }else{
            return '  <div class="row">
                          <div class="col-md-4  ">
                              <label class="block">
                                <div class="cartao-imagem no-placeholder">
                                    <div id="imagem-preview" class="img-cover img-rounded" style="background: url(\''.DIR_SEM_IMAGEM .'\') no-repeat 0 0 /cover; height: 250px;"></div>
                                    <div class="photo-upload-label">
                                        <p class="text-center"><i class="fa fa-camera"></i> Selecione a imagem</p>
                                    </div>
                                </div>
                                <input type="file" class="hidden cover-photo" name="imagem" id="imagem-principal"  >
                            </label>
                        </div>
                    </div>';
        }
    }

} 



 