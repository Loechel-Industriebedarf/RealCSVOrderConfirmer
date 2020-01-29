<?php
	require_once 'settings.php';
	require 'vendor/autoload.php';

	use Hitmeister\Component\Api\ClientBuilder;
	use Hitmeister\Component\Api\Namespaces\OrderUnitsNamespace;
	
	$client = ClientBuilder::create()
		->setClientKey($api_client)
		->setClientSecret($api_secret)
		->build();
		
	
	
	$file = fopen('tracking.csv', 'r');

	while (($line = fgetcsv($file, 0, ";")) !== FALSE) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $apiurl); //Add url to curl	
		$response = curl_exec($curl); //Call url via curl
			
		var_dump($response); //Show response
		echo "<br>";
		
		
		$client->orderUnits()->send($line[0], $line[1], $line[2]);
	}
	
	fclose($file);
?>