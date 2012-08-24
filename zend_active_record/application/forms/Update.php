<?php
require_once 'Zend/Form.php';
class Application_Form_Update extends Zend_Form
{

    public function init()
    {
		$session = new Zend_Session_Namespace('session');
		$updating_set = $session->result_set;
		 $firstname = $this->createElement('text','firstname');
        $firstname->setLabel('First Name:')
                    ->setAttrib('size',50)
					->setValue($updating_set[0]['firstname']);
        $lastname = $this->createElement('text','lastname');
        $lastname->setLabel('Last Name:')
                ->setAttrib('size',50)
				->setValue($updating_set[0]['lastname']);
        $username = $this->createElement('text','username');
        $username->setLabel('Username:')
                ->setAttrib('size',50)
				->setValue($updating_set[0]['username']);
    
        $email = $this->createElement('text','email');
        $email->setLabel("Email:")
                ->setAttrib('size',50)
				->setValue($updating_set[0]['email']);
				
       
        $update = $this->createElement('submit','update');
        $update->setLabel("Update")
                ->setIgnore(true);


		$this->setMethod('post');
		//$this->setAttrib('controller','index');
		$this->setAttrib('action','save');
		 
        $this->addElements(array(	
            $firstname,
            $lastname,
            $username,
            $email,
            $update
        ));
		
    }


}

?>