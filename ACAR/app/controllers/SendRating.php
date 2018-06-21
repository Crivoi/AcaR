<?php

 require_once '../app/models/Model.php';

 class SendRating extends Controller{

 	public function trimiteRating(){

 		$modelcon = $this->model('Model');


 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
         $id = $jsonData->id;
         $valoareaNotei=$jsonData->valoareaNotei;
 		$result = $modelcon->insertRating($id,$valoareaNotei);

 		echo $result;

 	}
 }

?>