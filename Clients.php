<?php
	
	class Clients extends DatabaseConnect{
		
		private $mysqli;
		
		public function __construct() {
			$this->mysqli = $this->connect();
		}
		
		public function getAllClients()
		{
			$sql     = "SELECT * FROM client";
			$result  = $this->connect()->query($sql);
			$numRows = $result->num_rows;
			
			//if numRows > 0, there is data
			if($numRows > 0) {
				while ($row = $result -> fetch_assoc()){
					$data[] = $row;
				}
				return $data;
			}else{
				print "There is no client, please add one or more clients";
			}
		}
		
		public function addClient( $firstName , $lastName)
		{
			try {
				$stmt   = $this->mysqli->prepare("INSERT INTO client(firstname,lastname) VALUES (?,?)" );
				$stmt   ->bind_param('ss', $firstName,$lastName);
				$result = $stmt ->execute();
				return $result;
			}catch(Exception $e) {
				echo "Message: ". $e->getMessage();
			}
		}
		
		public function findById ($id) {
			$sql     = "SELECT * FROM client WHERE id=".$id;
			$result  = $this->connect()->query($sql);
			$numRows = $result->num_rows;
			
			//if numRows > 0, there is data
			if($numRows > 0) {
				return $numRows;
			}else{
				print "Didn't found client, please add one or more client\n";
				exit;
			}
		}
		
		public function updateClient ($firstName, $lastName, $clientId)
		{
			$stmt   = $this->mysqli->prepare("UPDATE client SET firstname=?, lastname=? WHERE id=?");
			$stmt   ->bind_param('sss', $firstName, $lastName, $clientId);
			$result = $stmt ->execute();
			return $result;
		}
	}