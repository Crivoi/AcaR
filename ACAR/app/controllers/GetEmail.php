<?php

 require_once '../app/models/Model.php';

 class GetEmail extends Controller{

 	public function verificaEmail(){

 		$modelcon = $this->model('Model');


 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
 		$email = $jsonData->email;
 		$result = $modelcon -> getEmail($email);

 		echo $result;

 	}
 }

?>