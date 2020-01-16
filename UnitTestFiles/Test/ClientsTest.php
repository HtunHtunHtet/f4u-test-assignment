<?php
	
	use PHPUnit\Framework\TestCase;
	
	require "DatabaseConnect.php";
	require "Clients.php";
	
	class ClientsTest extends TestCase{
		
		public function testGetAllClients()
		{
			$clients = new Clients();
			$getAllClients = $clients->getAllClients();
			$this->assertIsArray($getAllClients,'getAllClients is not returning array');
		}
		
		public function testAddClient()
		{
			$firstName = "Ryan";
			$lastName  = "Htun";
			
			$clients = new Clients();
			$this->assertIsInt($clients->addClient($firstName,$lastName));
		}
		
		public function testFindById()
		{
			//look into database and try to change the client_id , client_id 40 will generate failure when run test
			$client_id = 40;
			
			$clients = new Clients();
			$this->assertEquals(true, $clients->findById($client_id));
		}
		
		public function testUpdateClient ()
		{
			//look into database and try to change the client_id
			$client_id = 1;
			$firstName = 'firstName test';
			$lastName  = 'lastName test';
			
			$clients = new Clients();
			$this->assertEquals(true, $clients->updateClient($firstName, $lastName, $client_id ));
		}
	}