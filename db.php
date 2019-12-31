<?php

class Db {
	
	public $mysql;
	
	function __construct() {
		$this->mysql = new mysqli('localhost', 'root', 'yourPassword', 'db') or die("problem");
	}
	
	function delete_by_id($id) {
		$query = "DELETE from todo WHERE id = $id";
		$result = $this->mysql->query($query) or die("Error");
		
		if($result) return 'Success';
	}
	
	function update_by_id($id, $description) {
		$query = "UPDATE todo
		         SET description = ?
				 WHERE id = ?
				 LIMIT 1";
				 
		 if($stmt = $this->mysql->prepare($query)) {
		 	$stmt->bind_param('si', $description, $id);
			$stmt->execute();
			return "Success";
		 }
	}
	
}


