<?php 

	Class Database{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db="knjigolovac"; 
		private $dblink;

		public function __construct(){
			try {	
				$this->dblink = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}
		
		public function vrati(){
    return $this->dblink;
}
		
?>