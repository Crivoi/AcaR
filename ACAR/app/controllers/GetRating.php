<?php

 require_once '../app/models/Model.php';

 class GetRating extends Controller{

 	public function afiseazaRating(){

 		$modelcon = $this->model('Model');


 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
 		$id = $jsonData->id;
 		$result = $modelcon->getRating($id);

 		echo $result;

 	}
 }

?>