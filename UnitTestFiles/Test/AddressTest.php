<?php
	
	use PHPUnit\Framework\TestCase;
	
	require "DatabaseConnect.php";
	require "Address.php";
	
	class AddressTest extends TestCase{
		
		public function testUpdateAddress()
		{
			$address = new Address();
			$addressDetails =  [
				"city"      =>"Singapore",
				"street"    => "Yishun",
				"country"   => "Singapore",
				"zipCode"   => "1235"
			];
			$client_id  = 40;
			$fieldToUpdate = "tertiary";
			
			$this->assertEquals(true, $address->updateAddresses($addressDetails,$client_id,$fieldToUpdate));
		}
		
	}