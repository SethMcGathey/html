<?php
//require_once 'sessionStart.php'; 
// This file is generated by Composer
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'vendor/autoload.php';

$client = new \Github\Client();
$repositories = $client->api('user')->repositories('endoftheline');