<?php
	
 function  printClientsAndAddressDetails ($users){
	 foreach($users as $user) {
		 $primaryAddress = "-";
		 $secondaryAddress = "-";
		 $tertiaryAddress = "-";
		
		 if(!empty($user['primary_address']))
			 $primaryAddress= json_decode($user['primary_address']);
		 if(!empty($user['secondary_address']))
			 $secondaryAddress= json_decode($user['secondary_address']);
		 if(!empty($user['tertiary_address']))
			 $tertiaryAddress= json_decode($user['tertiary_address']);
		
		 echo "\n============================================\n";
		 echo "UserId : " . $user['id'] . "\n";
		 echo "First Name: " . $user['firstname'] . "\n";
		 echo "Last Name: " . $user['lastname'] . "\n";
		 echo "---------------\n";
		
		 echo "Primary Address: \n";
		 echo "---------------\n";
		 echo "City : ".$primaryAddress->city . "\n";
		 echo "Street : ".$primaryAddress->street . "\n";
		 echo "Country : ".$primaryAddress->country . "\n";
		 echo "Zip Code : ".$primaryAddress->zipCode . "\n";
		
		 if(!empty($user['secondary_address'])) {
			 echo "---------------\n";
			 echo "Secondary Address: \n";
			 echo "---------------\n";
			 echo "City : ".$secondaryAddress->city . "\n";
			 echo "Street : ".$secondaryAddress->street . "\n";
			 echo "Country : ".$secondaryAddress->country . "\n";
			 echo "Zip Code : ".$secondaryAddress->zipCode . "\n";
		 }
		
		 if(!empty($user['tertiary_address'])) {
			 echo "---------------\n";
			 echo "Tertiary Address: \n";
			 echo "---------------\n";
			 echo "City : ".$tertiaryAddress->city . "\n";
			 echo "Street : ".$tertiaryAddress->street . "\n";
			 echo "Country : ".$tertiaryAddress->country . "\n";
			 echo "Zip Code : ".$tertiaryAddress->zipCode . "\n";
		 }
		 echo "============================================\n";
	 }
 }