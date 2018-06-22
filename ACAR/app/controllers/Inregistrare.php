<?php

 require_once '../app/models/Model.php';

 class Inregistrare extends Controller{

 	public function singUp(){

 		$modelcon = $this->model('Model');

 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);

 		$username = $jsonData->username;
 		$password = $jsonData->pass;
 		
 		$result = $modelcon -> insertUser($username, $password);

 	}
 }

?>