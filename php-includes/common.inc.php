<?php

function promptInput($text) {
	echo $text;
	$handle = fopen ("php://stdin","r");
	return trim(fgets($handle));
	
}

function promptAddressInput() {
	$street = promptInput('Enter Street Name: ');
	$city   = promptInput('Enter City Name: ');
	$zipCode= promptInput('Enter ZipCode: ');
	$country= promptInput('Enter Country: ');
	
	return array('street' => $street, 'city' => $city, 'zipCode' => $zipCode , 'country' => $country);
}