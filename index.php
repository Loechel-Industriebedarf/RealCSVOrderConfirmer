<?php
	require_once 'settings.php';
	require 'vendor/autoload.php';

	use Hitmeister\Component\Api\ClientBuilder;
	use Hitmeister\Component\Api\Namespaces\OrderUnitsNamespace;
	
	$client = ClientBuilder::create()
		->setClientKey($api_client)
		->setClientSecret($api_secret)
		->build();
		
	$client->orderUnits()->send(314567863347035, "DHL", "00340434281548406657");
?>