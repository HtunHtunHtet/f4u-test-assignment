<?php
    include 'DatabaseConnect.php';
    include 'Clients.php';
    include 'php-includes/intro.inc.php';
    include 'php-includes/menu.inc.php';
	
    
    print $input =intro();
    print mainMenuControl($input);
    
	
	
	



