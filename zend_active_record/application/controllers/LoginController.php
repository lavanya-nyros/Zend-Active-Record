<?php
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';
require_once 'Zend/Session/Abstract.php';
$session = new Zend_Session_Namespace('session');
class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		
		
		$form = new Application_Form_Login();
		$this->view->form = $form;
    }
	
	   
	  public function authAction(){
	  
		  if ($this->getRequest()->isPost())
			{
			  $form = new Application_Form_Login();
				$this->view->form = $form;
				$formData  = $this->_request->getPost();
				
				if(!strlen($formData['username']) || !strlen($formData['password'])) {
					$this->_redirect('/login'); 
            		return false;
        		}
			  
				$request    = $this->getRequest();
				$registry   = Zend_Registry::getInstance();
				$auth       = Zend_Auth::getInstance();
				 
				$DB = $registry['DB'];
					 
				$authAdapter = new Zend_Auth_Adapter_DbTable($DB);
				$authAdapter->setTableName('users')
							->setIdentityColumn('username')
							->setCredentialColumn('password');   
				 
				// Set the input credential values
				$uname = $request->getParam('username');
				$paswd = $request->getParam('password');
				$authAdapter->setIdentity($uname);
				$authAdapter->setCredential($paswd);
			 
				// Perform the authentication query, saving the result
				$result = $auth->authenticate($authAdapter);
				$data = $authAdapter->getResultRowObject(null,'password');
				  
				if($result->isValid()){
				  $auth->getStorage()->write($data);
				  $this->_helper->redirector('welcome', 'Login');
				}
				else{
				  $this->_redirect('/login');
				}
				 
			}		 
		
	  }
	  
	  
	  public function delAction()
	  {
	     $registry = Zend_Registry::getInstance(); 
	     $DB = $registry['db'];
		 $object = new Application_Model_Login();
	     $request = $this->getRequest();
	     $object->delete('users',$request->getParam('id'));   
	     $this->_helper->redirector('welcome', 'Login');
	  }
	  
	  
	  public function editAction()
	  {
	  	$users = new Application_Model_Login();
	   	$request = $this->getRequest();
		$id = $request->getParam('id');
		$session = new Zend_Session_Namespace('session');
		$session->id = $id;
		$result_set = $users->find('users',$id);
		$session->result_set = $result_set;
		$this->_helper->redirector('update', 'Login');
		
	  }  
	  
	  
	  public function welcomeAction()
	  {
			//$request = $this->getRequest();
			//$result1 = $request->getParam('result');
			//$this->view->result = $result1;
			
			//$session = new Zend_Session_Namespace('session');
			//$this->view->result = $session->result;
			
			$request = $this->getRequest();
			$res = $request->getParam('result');
			
			$this->view->result = $res;
			
			
	  }
	  
	  public function updateAction()
	  {
	  		$session = new Zend_Session_Namespace('session');
		 	$form = new Application_Form_Update();
			$this->view->form = $form;
			$this->view->result_set = $session->result_set;
	  }
	  
	  public function findAction(){
	  
	  	$users = new Application_Model_Login();
		unset($_POST['find']);
		print_r($_POST);exit;
		$result = $users->find('users',$_POST['id']);
		print_r($result);exit;
		
	  }
	  
	  public function insertAction()
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
					$database_object->insert($formData);
					$this->_helper->redirector('index', 'Login');
            	}
	
			}
		 }
	  }
	  
	  
	  public function sortAction(){

			$session = new Zend_Session_Namespace('session');
			
			$users = new Application_Model_Login();
			$request = $this->getRequest();
			
			if($session->order == 'desc'){
				$sort_result = $users->sorts('users',$request->getParam('value'),'desc'); 
				$session->order = 'asc';
			}
			
			else{
				$sort_result = $users->sorts('users',$request->getParam('value'),'asc'); 
				$session->order = 'desc';
			}
			
			
			
			$res = Zend_Json::encode($sort_result);	
			//$session->result = $sort_result;
			
			//$this->view->result = $res;
			
			
			/*$view = new Zend_View();
			
			$view->assign('result',$sort_result);
			
			echo $view->render('welcome.phtml');*/
			
			
			//$this->_redirect('/Login/welcome');
		
			$this->_redirect('/Login/welcome/result/'.$res);
	  }
	  
	  
	  public function saveAction()
	{
		$session = new Zend_Session_Namespace('session');
		if ($this->getRequest()->isPost())
		{
			$form = new Application_Form_Update();
			$database_object = new Application_Model_Login();
			$formData  = $this->_request->getPost();
			
            if ($form->isValid($formData)) {
				
			
				if(!strlen($formData['username']) || !strlen($formData['firstname']) ) {
				
					$this->_redirect('/Login/Update'); 
            		return false;
        		}
				else{
					
					unset($formData['update']);
					
					$database_object->update($session->id,$formData,'users');
					$this->_helper->redirector('welcome', 'Login');
            	}
			
	
			}
		
		}
	}
	  


}

