<?php

 require_once '../app/models/Model.php';

 class SendRating extends Controller{

 	public function trimiteRating(){

 		$modelcon = $this->model('Model');


 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
         $id = $jsonData->id;
		 $valoareaNoteiNoi=$jsonData->valoareaNoteiNoi;
		 $numarVoturi=$jsonData->numarVoturi;
		 $valoareaNoteiVechi=$jsonData->valoareaNoteiVechi;

 		$result = $modelcon->insertRating($id,$valoareaNoteiNoi, $valoareaNoteiVechi, $numarVoturi);

 		echo $result;

 	}
 }

?>