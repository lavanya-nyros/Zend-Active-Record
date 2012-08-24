<?php
require_once 'Zend/Form.php';
class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        $firstname = $this->createElement('text','firstname');
        $firstname->setLabel('First Name:')
                    ->setAttrib('size',50);
        $lastname = $this->createElement('text','lastname');
        $lastname->setLabel('Last Name:')
                ->setAttrib('size',50);
        $username = $this->createElement('text','username');
        $username->setLabel('Username:')
                ->setAttrib('size',50);
		$password = $this->createElement('password','password');
        $password->setLabel('Password:')
                    ->setAttrib('size',50);

        $password2 = $this->createElement('password','password2');
        $password2->setLabel('Confirm Password:')
                    ->setAttrib('size',50);
        $email = $this->createElement('text','email');
        $email->setLabel('Email:')
                ->setAttrib('size',50);
       
        $register = $this->createElement('submit','register');
        $register->setLabel("Register")
                ->setIgnore(true);


		$this->setMethod('post');
		//$this->setAttrib('controller','index');
		$this->setAttrib('action','index/save');
		 
        $this->addElements(array(	
            $firstname,
            $lastname,
            $username,
			$password,
            $email,
            $password2,
            $register
        ));
		
		
    }
	
/**

	<form action="page.php" method="post">
	
		<input type="text" name="blah" />
	
	</form>

*/


}

