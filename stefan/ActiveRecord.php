<?php
abstract class ActiveRecord {
	
	public static function getAll($filter=""){
	$query = mysqli_query(Db::getConnection(), 
	"select * from ". static::$table ." ". $filter);
	$result = array();
	while($row=mysqli_fetch_object($query,get_called_class()))
		$result[] = $row;
	return $result;
	}
	
	public static function get($id){
		$query = mysqli_query(Db::getConnection(), "select * from ".static::$table . " where ".static::$key." = " . $id);
		return mysqli_fetch_object($query, get_called_class());
	}
	
	public function save(){
		$query = "update " . static::$table . " set ";
		foreach($this as $key=>$value){
			if($key==static::$key)
				continue;
			$query .=$key."='".$value."',";
		}
		$query = rtrim($query,",");
        $key_field = static::$key;		
		$query .="where ".static::$key." = " . $this->$key_field;
		mysqli_query(Db::getConnection(),$query);
	}
	
	public function insert(){
		$fields = get_object_vars($this);
		$keys = array_keys($fields);
		$values = array_values($values);
		$query = "insert into " . static::$table . "(";
		$query .= implode(",",$keys);
		$query .=") values ('";
		$query .= implode("','",$values);
		$query .="')";
		mysqli_query(Db::getConnection(),$query);
	}
	
	public static function delete(){
		"delete from " . static::$table . " where ". static::$key . " = " . $id;
	}
}