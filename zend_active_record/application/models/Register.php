<?php

class Application_Model_Register
{	
	
	public function insert($table,$params=array()){
		
		$db = Zend_Registry::get('db'); 
		
		$sql1="insert into $table(firstname,lastname,username,password,email) values('".implode("','",$params)."')";
			
		$db->query($sql1);
			
		
	}

}
?>