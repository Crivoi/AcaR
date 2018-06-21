<?php

session_start();

 require_once '../app/models/Model.php';

 class Logare extends Controller{

 	public function login(){

 		$modelcon = $this->model('Model');

 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);

 		$user = $jsonData->user;
 		$parola = $jsonData->parola;
 		
 		$resultuser = $modelcon->getUser($user);
		$resultpassword = $modelcon->getParola($parola);
 		if ($resultuser == 1){

 			if ($resultpassword == 1){
				 $token = $modelcon->makeToken($user);
				 $_SESSION['token'] = $token ;
 				echo $_SESSION['token'];
 			} else {
 				echo "Parola incorecta";
 			}
 		} else {
 			echo "User incorect ";
 		}
	 }

 	public function delogin(){

 		$modelcon = $this->model('Model');

 		$jsonData = file_get_contents('php://input');
		$jsonData = json_decode($jsonData);
		$token = $jsonData->token;

 		$result = $modelcon->deleteToken($token);
 		unset($_SESSION['user']);
 		session_destroy();
 		echo $result;
 	}
 }

?>