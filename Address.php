<?php
	
	class Address extends DatabaseConnect{
		
		private $mysqli;
		
		public function __construct() {
			$this->mysqli = $this->connect();
		}
		
		
		public function updateAddresses(array $data, int $clientId , string $fieldToAdd)
		{
			try {
				$address = json_encode($data);
				switch ($fieldToAdd){
					case 'primaryAdd':
						$sql = "INSERT INTO address(client_id,primary_address) VALUES (?,?)";
						$stmt   = $this->mysqli->prepare($sql);
						$stmt   ->bind_param('ss', $clientId,$address);
						break;
					case 'primaryUpdate':
						$sql = "UPDATE address SET primary_address=? WHERE client_id=?";
						$stmt   = $this->mysqli->prepare($sql);
						$stmt   ->bind_param('ss',$address,$clientId);
						break;
					case 'secondary':
						$sql = "UPDATE address SET secondary_address =? WHERE client_id=?";
						$stmt   = $this->mysqli->prepare($sql);
						$stmt   ->bind_param('ss', $address,$clientId);
						break;
					case 'secondaryDelete':
						$sql     = "UPDATE address SET secondary_address =? WHERE client_id=?";
						$address = NULL;
						$stmt    = $this->mysqli->prepare($sql);
						$stmt    ->bind_param('ss', $address,$clientId);
						break;
					case 'tertiary':
						$sql = "UPDATE address SET tertiary_address=? WHERE client_id=?";
						$stmt   = $this->mysqli->prepare($sql);
						$stmt   ->bind_param('ss', $address,$clientId);
						break;
					case 'tertiaryDelete':
						$sql     = "UPDATE address SET tertiary_address =? WHERE client_id=?";
						$address = NULL;
						$stmt    = $this->mysqli->prepare($sql);
						$stmt    ->bind_param('ss', $address,$clientId);
						break;
				}
				
				$result = $stmt ->execute();
				return ($result == 1) ?  true : false;
				
			
			}catch(Exception $e) {
				echo "Message: ". $e->getMessage();
			}
		}
	}
	