<?php
//require_once 'sessionStart.php'; 
// This file is generated by Composer
//require_once 'vendor/autoload.php';

$client = new \Github\Client();
$repositories = $client->api('Smcgath')->repositories('endoftheline');