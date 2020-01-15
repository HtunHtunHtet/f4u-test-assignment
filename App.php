<?php
    include 'DatabaseConnect.php';
    include 'Clients.php';
    include 'Address.php';
    include 'php-includes/intro.inc.php';
    include 'php-includes/menu.inc.php';
    
    while(true){
	    $input =intro();
	    mainMenuControl($input);
    }
    
    
    
	
	
	



