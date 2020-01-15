<?php
	
	class Clients extends DatabaseConnect{
		
		private $mysqli;
		
		public function __construct() {
			$this->mysqli = $this->connect();
		}
		
		public function getAllClients(): array
		{
			$sql     = "Select c.*, a.*
						From client c
						LEFT JOIN address a
						ON c.id = a.client_id;
						";
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
		
		public function addClient(string $firstName ,string $lastName) :int
		{
			try {
				$stmt   = $this->mysqli->prepare("INSERT INTO client(firstname,lastname) VALUES (?,?)" );
				$stmt   ->bind_param('ss', $firstName,$lastName);
				$stmt   ->execute();
				return $stmt->insert_id;
			}catch(Exception $e) {
				echo "Message: ". $e->getMessage();
			}
		}
		
		public function findById (int $id): int
		{
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
		
		public function updateClient ($firstName, $lastName, $clientId) :int
		{
			$stmt   = $this->mysqli->prepare("UPDATE client SET firstname=?, lastname=? WHERE id=?");
			$stmt   ->bind_param('sss', $firstName, $lastName, $clientId);
			$result = $stmt ->execute();
			return $result;
		}
	}