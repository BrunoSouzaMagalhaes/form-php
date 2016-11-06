<?php
namespace Form\components;
use Form\ElementForm;

class InputFile extends ElementForm
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
            return str_replace('%s','<div class="toggle-light" style="width: 20%; ; margin-top: 35px 0 15px"  >  
                        <label style="position:absolute; width:100%; margin-top:-23px">'.$this->getLabel().'</label>
                        
                        
                  <div class="form-group">
                    <div class="file-input file-input-ajax-new"><div class="file-preview ">
                            <div class="close fileinput-remove">×</div>
                            <div class=" file-drop-zone"><div class="file-drop-zone-title">Drag &amp; drop files here …</div>
                            <div class="file-preview-thumbnails"></div>
                            <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                            <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="kv-upload-progress hide"><div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                0%
                             </div>
                        </div></div>
                        <div class="input-group ">
                           <div tabindex="500" class="form-control file-caption  kv-fileinput-caption">
                           <div class="file-caption-name" title=""></div>
                        </div>
                        
                           <div class="input-group-btn">
                               <button type="button" tabindex="500" title="Clear selected files" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-trash"></i> Remove</button>
                               <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default hide fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>
                               <a href="#" tabindex="500" title="Upload selected files" class="btn btn-default fileinput-upload fileinput-upload-button"><i class="glyphicon glyphicon-upload"></i> Upload</a>
                               <div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse …<input id="file-4" type="file" class="file input-file" data-upload-url="#"></div>
                           </div>
                        </div></div>
                </div>
                         
                         
                  </div>', $this->container);
        }else{
            return '<div class="toggle-light" style="margin:35px 0 15px"  >  
                  <div>
                        <label style="position:absolute; width:100%; margin-top:-23px">'.$this->getLabel().'</label>
                        
                        
                        
                   <div class="form-group">
                    <div class="file-input file-input-ajax-new"><div class="file-preview ">
                            <div class="close fileinput-remove">×</div>
                            <div class=" file-drop-zone"><div class="file-drop-zone-title">Drag &amp; drop files here …</div>
                            <div class="file-preview-thumbnails"></div>
                            <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                            <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="kv-upload-progress hide"><div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                0%
                             </div>
                        </div></div>
                        <div class="input-group ">
                           <div tabindex="500" class="form-control file-caption  kv-fileinput-caption">
                           <div class="file-caption-name" title=""></div>
                        </div>
                        
                           <div class="input-group-btn">
                               <button type="button" tabindex="500" title="Clear selected files" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-trash"></i> Remove</button>
                               <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default hide fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>
                               <a href="#" tabindex="500" title="Upload selected files" class="btn btn-default fileinput-upload fileinput-upload-button"><i class="glyphicon glyphicon-upload"></i> Upload</a>
                               <div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse …<input id="file-4" type="file" class="file input-file" data-upload-url="#"></div>
                           </div>
                        </div></div>
                </div>
                        
                        
                        
                        
                        <input type="hidden" '.$attrs.' />
                        <div class="toggles" data-toggle-on="true" data-toggle-height="40" data-toggle-width="60" style="margin-top:25px" ></div>
                        <div class="toggle on"  '.$attrs.' ></div>
                  </div> 
              </div>';
            
            
            //return  "<input type='button' ".$attrs."  >"; 
        }
    }
      
    
} 

 