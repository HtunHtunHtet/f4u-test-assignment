<?php
	
 include 'common.inc.php';
	
 function mainMenuControl ( $input){
	 $clients = new Clients();
	 $address     = new Address();
	 
	 switch($input){
		 case 1:
		    $users = $clients->getAllClients();
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
		    break;
			 
		 case 2:
		    $firstName = promptInput('Enter First Name: ');
		    $lastName  = promptInput('Enter Last name: ');
		    $insertedId = $clients->addClient($firstName, $lastName);
		    echo "Success! Client Name Successfully added \n\n";
		
		    //add Primary Address straight away
		    $addressData = promptAddressInput();
		   
		    $result = $address->updateAddresses($addressData,$insertedId,'primaryAdd');
		    
		    echo ($result) ? "Successfully added the Address\n" : "Failed to add the Address\n";
		    break;
		    
		 case 3:
		 	$clientId = promptInput('Which client id would you like to update: ');
		 	$findResult = $clients->findById($clientId);
		 	
		 	if($findResult > 0) {
			    $firstName = promptInput('Enter First Name: ');
			    $lastName  = promptInput('Enter Last name: ');
		 	    $result = $clients->updateClient($firstName,$lastName,$clientId);
		 	    
			    echo ($result == 1)
				    ?  'Success! client information successfully changed.'
                    :  'Failed to change client information';
		    }else {
		 		echo "Enable to find Client\n";
		    }
		 	break;
		 	
		 case 4:
			
			 $clientId = promptInput('Find client with client id : ');
			 $findResult = $clients->findById($clientId);
			 
			 if ($findResult > 0){
				 $choice = promptInput('Enter \'a\' to update primary address. Enter \'b\' to add/update secondary address. Enter \'c\' to add/update tertiary address:  ');
				 $addressData = promptAddressInput();
				 $result    = false;
				 
				 switch ($choice){
					 case 'a':
						 $result = $address->updateAddresses($addressData, $clientId,'primaryUpdate');
					 	break;
					 case 'b':
						 $result = $address->updateAddresses($addressData, $clientId,'secondary');
					 	break;
					 case 'c':
						 $result = $address->updateAddresses($addressData, $clientId,'tertiary');
					 	break;
				 }
				 
				 echo ($result) ? "Successfully added the Address" : "Failed to add the Address";
				 
			 }else {
			 	echo "Enable to find Client\n";
			 }
			 break;
			 
		 case 5:
			 $clientId   = promptInput('Find client with client id : ');
			 $findResult = $clients->findById($clientId);
			 $result     = false;
			 
			 if ($findResult > 0){
				 $choice = promptInput('Enter \'a\' to remove secondary address. Enter \'b\' to delete tertiary address:  ');
				 
				 switch($choice){
					 case 'a':
					 	$result = $address->updateAddresses(array(), $clientId,"secondaryDelete");
					 	break;
					 	
					 case 'b':
						 $result = $address->updateAddresses(array(), $clientId,"tertiaryDelete");
					 	break;
				 }
					
			 }
			 
			 echo ($result) ? "Successfully Delete the address\n" : "Failed to delete the address\n";
			 break;
		 	
	 }
 }