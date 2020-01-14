<?php
	
 include 'common.inc.php';
	
 function mainMenuControl ( $input){
	 $clients = new Clients();
	 
	 switch($input){
		 case 1:
		    $users = $clients->getAllClients();
		    foreach($users as $user) {
			    echo "\nUserId : " . $user['id'] . "\n";
			    echo "First Name: " . $user['firstname'] . "\n";
			    echo "Last Name: " . $user['lastname'] . "\n";
			    echo "====================================\n";
		    }
		    break;
			 
		 case 2:
		    $firstName = promptInput('Enter First Name: ');
		    $lastName  = promptInput('Enter Last name: ');
		    $result = $clients->addClient($firstName, $lastName);
		    echo ($result == 1) ?  'Success! Client Name Successfully added' :  'Failed to add Client';
		    break;
		    
		 case 3:
		 	$userId = promptInput('Which user id would you like to update: ');
		 	$findResult = $clients->findById($userId);
		 	
		 	if($findResult > 0) {
			    $firstName = promptInput('Enter First Name: ');
			    $lastName  = promptInput('Enter Last name: ');
		 	    $result = $clients->updateClient($firstName,$lastName,$userId);
			    echo ($result == 1) ?  'Success! client information successfully changed.' :  'Failed to change client information';
		    }
		 	break;
		 	
	 }
 }