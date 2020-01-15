<?php

function promptInput($text) {
	echo $text;
	$handle = fopen ("php://stdin","r");
	return trim(fgets($handle));
	
}