<?php
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$database_object = new Application_Model_Register();
		$form = new Application_Form_Register();
		$this->view->form = $form;
    }
		
	
	
	public function saveAction()
	{
		
		if ($this->getRequest()->isPost())
		{
		
			$database_object = new Application_Model_Register();
			$formData  = $this->_request->getPost();
			$form = new Application_Form_Register();
			$this->view->form = $form;
			
            if ($form->isValid($formData)) {
			
				if(!strlen($formData['username']) || !strlen($formData['password']) ) {
					$this->_redirect('/index/'); 
            		return false;
        		}
			
                if ($formData['password'] != $formData['password2']) {
				  $this->_redirect('/index/'); 
				    return false;
                }
				
				else{
					unset($formData['password2']);
					unset($formData['register']);
					$database_object->insert('users',$formData);
					$this->_helper->redirector('index', 'Login');
            	}
			
	
			}
		
		}
	}

	
	public function welcomeAction()
    {		
    }

	
	
	
}
?>