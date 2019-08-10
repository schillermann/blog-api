<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . './../vendor/autoload.php';

//list( $req_uri ) = explode( '?', $_SERVER['REQUEST_URI'] );

$uri = $_SERVER['REQUEST_URI'];
$response = \SimpleApi\Endpoint::getResponse($uri, $_SERVER['REQUEST_METHOD']);

header('Content-type: application/json');
echo json_encode( $response );