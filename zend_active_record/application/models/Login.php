<?php

require_once 'Zend/Db.php';
require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Login
{	
	
	/* ============ finds all the records ================= */
	
	public function fetchAll($table)
	{
	$db = Zend_Registry::get('db'); 
			$sql = "select * from ".$table;
			$stmt   = $db->query($sql);
			$result = $stmt->fetchAll(Zend_Db::FETCH_ASSOC); 
			return $result;
	}	
	
	
	/* ================= Update method ================= */
	
	public function update($condition,$colums,$table)
	{
			
			$db = Zend_Registry::get('db'); 
			$keys=array_keys($colums);
	  		$values=array_values($colums);
			for($i=0;$i<count($keys);$i++){
				$newarr[]=$keys[$i]."='".$values[$i]."'";
			}
			$str=join(',',$newarr);
			
			$quer="update $table set $str where id=$condition"; 
			$resultset=$db->query($quer);
			
	
	}
	
	
	
	public function fetchone($table){
		
		$db = Zend_Registry::get('db'); 
		 $sql11 = "SELECT categories FROM ".$table; 
		 $stmt11   = $db->query($sql11);
		 $result11 = $stmt11->fetchAll(Zend_Db::FETCH_ASSOC); 
		 return $result11;
	
	}
	
	
	/* ============ find by ID ================= */
	
	public function find($table,$id){
		
		$db = Zend_Registry::get('db'); 	
		$find = "select * from $table where id=".$id;
		$find_row = $db->query($find);
		$find_result = $find_row->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $find_result;
	
	}
	
	/* ============ For finding by column value ================= */
	
	public function findby_column($table,$column,$value){

		$db = Zend_Registry::get('db'); 	
		$find = "select * from $table where $column='".$value."'";
		$find_row = $db->query($find);
		$find_result = $find_row->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $find_result;
	
	}
	
	/* ============ For finding first record ================= */
	
	public function first($table){

		$db = Zend_Registry::get('db'); 
		$find = "select * from $table order by id ASC LIMIT 1";
		$find_row = $db->query($find);
		$find_result = $find_row->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $find_result;
	
	}
	
	/* ============ For finding last record ================= */
	
	public function last($table){

		$db = Zend_Registry::get('db'); 
		$find = "select * from $table order by id DESC LIMIT 1";
		$find_row = $db->query($find);
		$find_result = $find_row->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $find_result;
	
	}
	
	
	/* ============ For finding  Field names ================= */
	
	public function columns($table){
	
		$db = Zend_Registry::get('db'); 
		$columns = "show columns from $table";
		$columns = $db->query($columns);
		$columns = $columns->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $columns;
	
	}
	
	/* ============ Sort method ================= */
	
	public function sorts($table,$val,$order){
	
		$db = Zend_Registry::get('db'); 
		$sort = "select * from $table order by $val $order";
		$sort = $db->query($sort);
		$sort = $sort->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $sort;
	
	}
	
	
	/* ============ Delete method ================= */
	
	public function delete($table_name,$id)
	{
		$db = Zend_Registry::get('db'); 
		$del = "delete from ".$table_name." where id=".$id;
		$stmt   = $db->query($del);
			
	}
	
	/* ===================== Search method ============================ */
	
	public function search($table,$search_val,$columns)
	{
		$db = Zend_Registry::get('db'); 
		
		$qry;
		for($i=0;$i< count($columns);$i++){
			
			if( $columns[$i]["Field"] == "password") 
			 {
			 }
			 else{
				$qry=$qry .$columns[$i]['Field']." LIKE '%".$search_val."%' OR ";
			 }
		}
		
		$search = "select * from $table where ".$qry;
		
		$query1 = substr($search,0,(strlen($search)-3));
		
		$query1 = $db->query($query1);
		
		$search_res = $query1->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $search_res;
			
	}
	

}

