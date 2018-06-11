<?php

session_start();

 require_once '../app/models/Model.php';

 class Logare extends Controller{

 	public function login(){

 		$modelcon = $this->model('Model');

 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);

 		$email = $jsonData->email;
 		$password = $jsonData->pass;
 		
 		$resultemail = $modelcon->getEmail($email);
 		$resultpassword = $modelcon->getParola($password);

 		if ($resultemail == 0){

 			if ($resultpassword == 0){
 				$_SESSION['email'] = $email;
 				echo $_SESSION['email'];
 			} else {
 				echo "Parola incorecta";
 			}
 		} else {
 			echo "Email incorect ";
 		}

 	}

 	public function delogin(){

 		$modelcon = $this->model('Model');

 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
 		unset($_SESSION['email']);
 		session_destroy();
 		echo "deLogin";
 	}
 }

?>