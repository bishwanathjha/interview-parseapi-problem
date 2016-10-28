<?php

// print_r($_SERVER); die;

require_once('Classes.php');

$API = new Classes();

$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		$API->POST();
		break;

	case 'GET':
		$API->GET();
		break;

	case 'PUT':
		$API->PUT();
		break;

	case 'DELETE':
		$API->DELETE();
		break;
	
	default:
		$API->GET();
		break;
}

$API->Dispatch();