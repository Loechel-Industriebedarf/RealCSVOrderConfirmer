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
		try{
			$client->orderUnits()->send($line[0], $line[1], $line[2]);
			echo "SUCCESS: " . $line[0] . " " . $line[1] . " " . $line[2];
		}
		catch(Exception $e){
			echo "ERROR: &nbsp;&nbsp;" . $line[0] . " " . $line[1] . " " . $line[2];
		}	
		echo "<br>";
	}
	
	fclose($file);
?>