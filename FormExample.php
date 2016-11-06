<?php    
use Form\FormDefault;
use Form\components\Text;
use Form\components\Button;
use Form\components\Textarea;
use Form\components\ButtonOnOff;

class FormExample extends FormDefault {

	 function __construct(){
        
		$this->setName('frm-cliente');
		$this->setAction("logar.php");
		            
		$nmcliente = new Text('id_componente'); 
		$nmcliente->setContainer('<div class="form-group"> %s </div>')
		          ->setLabel("Nome do cliente *")
		          ->setAttrs(array( 'placeholder'=>'Nome do cliente') );      

		$descricao = new Textarea('descricao'); 
		$descricao->setContainer('<div class="form-group"> %s </div>')
		          ->setLabel("Informações Adicionais*")
		          ->setAttrs(array( 'placeholder'=>'Informações Adicionais'));   

        $onnOff = new ButtonOnOff('onnOff');
        $onnOff->setLabel("Liga desliga");
 
		$mecadastrar = new Button('mecadastrar');
		$mecadastrar->setContainer('<a href="#"> %s </a>');
		$mecadastrar->addClass('btn btn-success')
					->addClass('margin-botao')
					->setValue('Me cadastrar');

		       
		$this->setElements(array($nmcliente, $descricao, $onnOff, $mecadastrar) );    
	}

}