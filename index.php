<?php
	require_once 'settings.php';
	require 'vendor/autoload.php';

	use Hitmeister\Component\Api\ClientBuilder;
	use Hitmeister\Component\Api\Namespaces\OrderUnitsNamespace;
	
	$client = ClientBuilder::create()
		->setClientKey($api_client)
		->setClientSecret($api_secret)
		->build();
		
	
	
	$file = fopen('realtracking.csv', 'r');

	while (($line = fgetcsv($file, 0, ";")) !== FALSE) {	
		try{
			$result = $client->orderUnits()->send($line[0], $line[1], $line[2]);
			if(!$result){ throw new Exception("Error."); }
			echo "SUCCESS: " . $line[3] . " " . $line[0] . " " . $line[1] . " " . $line[2];
		}
		catch(Exception $e){
			echo "<b>ERROR: &nbsp;&nbsp;" . $line[3] . " ". $line[0] . " " . $line[1] . " " . $line[2] . "</b>";
		}	
		echo "<br>";
	}
	
	fclose($file);
?>