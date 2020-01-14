<?php
	
	class DatabaseConnect {
		
		private $servername;
		private $username;
		private $password;
		private $dbname;
		
		protected function connect(){
			$this->servername = "localhost";
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