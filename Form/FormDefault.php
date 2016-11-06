<?php
namespace Form;
abstract class FormDefault
{  
    protected $classForm=" ";
    private $tiposElementosAtivos = array();
    protected $dadosForm = array(
                                'nameForm'=>'formulario',
                                'method'=> 'post',
                                'action'=>'',
                                'enctype' => "multipart/form-data"
                                );    
     
     public function addClass($class){
        $this->classForm .= "$class ";
        return $this;
    }
    
     public function getClass(){
        if($this->classForm == "")
            return "";
        else
            return 'class="'.$this->classForm.'"'; 
    }
    
     public function setElements($elementos){ 
        if(!is_array($elementos)){ 
            $idelemento = $elementos->getAttrib('id');
            $this->$idelemento = $elementos;  
        }else{  
            foreach($elementos as $elemento){ 
                $idelemento = $elemento->getAttrib('id');
                $this->$idelemento = $elemento;  
            }
        } 
    }
 
     public function getElement($elemento){
         return $this->$elemento;
    }
 
    
    public function getElements(){  
        
        $html =  "<form ".self::getName()." ".
                      self::getAction()." ".
                      self::getEnctype()." ".
                      self::getClass()." ".
                      self::getMethod()." >";       
                      
        $atributos = get_object_vars($this);
         
        foreach ($atributos as $chave=>$elemento) { 
            $arrayExcessao = array('dadosForm','tiposElementosAtivos','tiposElementosAtivos','classForm'); 
             if( !in_Array($chave,$arrayExcessao)){
                $html .= $this->$chave->getElement();
                //verifica o tipo do elemento que esta sendo adinado para incluir sua biblioteca
                $this->vinculaTipoElemtoForm( get_class($this->$chave) );
             }
        }
        
        $html .= "</form>"; 
        $html .= $this->getBibliotecas();
        return $html;
    }
    
    public function __tostring()
    {
        
        return $this->getElements();
    }
 
    private function vinculaTipoElemtoForm($elemento)
    {  
        if(!in_array($elemento, $this->tiposElementosAtivos)){
            array_push($this->tiposElementosAtivos, $elemento);
        }
    }
    
    private function getBibliotecas()
    {
        $bibliotecas = "";
        foreach($this->tiposElementosAtivos as $elemento)
        {  
            if(strstr($elemento,'\\')){
                $e = explode('\\', $elemento);
                $elemento = $e[ count($e) -1 ];                
            } 
            switch($elemento){
                case "ButtonOnOff":
                    $bibliotecas .=   "<link href='/Form/components/libs/jquery-toggles-master/css/toggles.css' rel='stylesheet' type='text/css' />";
                    $bibliotecas .=   "<link href='/Form/components/libs/jquery-toggles-master/css/themes/toggles-light.css' rel='stylesheet' type='text/css' />";
                    $bibliotecas .=   "<script src='/Form/components/libs/jquery-toggles-master/toggles.min.js' type='text/javascript'></script>"; 
                break; 
                case "InputFile":
                    $bibliotecas .=   "<link href='/Form/components/libs/bootstrap-fileinput-master/css/fileinput.css' rel='stylesheet' type='text/css' />";
                    $bibliotecas .=   "<script src='/Form/components/libs/bootstrap-fileinput-master/js/fileinput.js' type='text/javascript'></script>"; 
                break;
            }
        }
        return $bibliotecas;
    } 
    
    public function removeElement($idelemento)
    {
        if(isset($this->$idelemento))
            unset($this->$idelemento);    
        return $this; 
    }
    
    public function removeElements($elementos)
    {
        if(!is_array($elementos)){ 
            if(isset($this->$elementos))
                unset($this->$elementos);
        }else{  
            foreach($elementos as $idelemento){ 
                if(isset($this->$idelemento))
                    unset($this->$idelemento); 
            }
        }
        return $this;
    }
     
    public function populate($elementos){
        
         foreach ($elementos as $chave=>$value) {
            if($chave != 'dadosForm'){ 
                if(property_exists($this,$chave) ){ 
                        $this->$chave->setValue($value); 
                }
            }
        }
    }
     
    public function getName()
    {
        return  "name='".$this->dadosForm['nameForm']."'  id='".$this->dadosForm['nameForm']."' ";
    }
    
    public function setName($nameForm)
    {
        $this->dadosForm['nameForm'] = $nameForm;
        return $this;
    }
    
    public function getAction()
    {
        if(!empty($this->dadosForm['action']))
            return  "action='".$this->dadosForm['action']."'";
    }
    
    public function setAction($action)
    {
         $this->dadosForm['action'] = $action;
         return $this;
    }
    
     public function getMethod()
    {
        return  "method='".$this->dadosForm['method']."'";
    }
    
    public function setMethod($action)
    {
        $this->dadosForm['method'] = $action;
        return $this;
    }
    
     public function getEnctype()
    {
         if(!empty($this->dadosForm['enctype']))
            return  "enctype='".$this->dadosForm['enctype']."'";
    }
    
    public function setEnctype($enctype)
    {
         $this->dadosForm['enctype'] = $enctype;
         return $this;
    }
    
    protected function getModel($model){
	   $modulo = $_SESSION['config']['modulo'];
		include_once dirname(__FILE__)."/../../$modulo/model/{$model}Model.php";
		
		$model = ucfirst($model)."Model"; 
		$$model = $model;
		$model = new $model();
		return  $model;
	}
} 
 
