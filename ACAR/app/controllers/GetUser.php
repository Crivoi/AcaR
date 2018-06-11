<?php

 require_once '../app/models/Model.php';

 class GetUser extends Controller{

 	public function verificaUser(){

 		$modelcon = $this->model('Model');


 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
 		$user = $jsonData->username;
 		$result = $modelcon->getUser($user);

 		echo $result;

 	}
 }

?>