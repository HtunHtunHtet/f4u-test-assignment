<?php
	
 function intro (){
	 echo "Console Base Application\n";
	 echo "===========================\n\n";
	 
	 echo "1) Lists All Clients\n";
	 echo "2) Add Clients\n";
	 echo "3) Update Client\n";
	
	 $handle = fopen ("php://stdin","r");
	 $input = trim(fgets($handle));
	 return $input;
 }