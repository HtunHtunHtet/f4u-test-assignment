<?php
	
 function intro (){
	 echo "\n\n===========================\n";
	 echo "Console Base Application\n";
	 echo "===========================\n\n";
	 
	 echo "1) Lists All Clients With Address \n";
	 echo "2) Add Clients\n";
	 echo "3) Update Client\n";
	 echo "4) Add/Update Addresses\n";
	 echo "5) Delete Addresses\n";
	 echo "0) Exit Program\n\n";
	 echo "Select one from the above list: ";
	 $handle = fopen ("php://stdin","r");
	 $input = trim(fgets($handle));
	 return $input;
 }