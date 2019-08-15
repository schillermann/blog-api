<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . './../vendor/autoload.php';

list( $uri ) = explode( '?', $_SERVER['REQUEST_URI'] );
$response = FuncApi\Endpoint::getResponse($uri, $_SERVER['REQUEST_METHOD']);

header('Content-type: application/json');
echo json_encode( $response );