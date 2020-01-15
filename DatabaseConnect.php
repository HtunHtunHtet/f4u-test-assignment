<?php
	
	
	class DatabaseConnect {
		
		private $servername;
		private $username;
		private $password;
		private $dbname;
		
		public function connect(){
			$this->servername = "127.0.0.1:8889";
			$this->username   = "root";
			$this->password   = "root";
			$this->dbname     = "php_assignment";
			
			$connection = new mysqli(
				$this->servername , $this->username,
				$this->password   , $this->dbname
				);
			
			return $connection;
		}
		
	}