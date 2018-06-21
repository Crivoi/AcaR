<?php
 require_once '../app/models/Model.php';

 class PostSurvey extends Controller{

 	public function verificaSurvey(){

 		$modelcon = $this->model('Model');


 		$jsonData = file_get_contents('php://input');
 		$jsonData = json_decode($jsonData);
 		
		$facultate = $jsonData->facultate;
		$an = $jsonData->an;
		$semestru = $jsonData->semestru;
		$materie = $jsonData->materie;
		$prof = $jsonData->prof;
		$review = $jsonData->review;
		$token = $jsonData->token;
 		$result = $modelcon -> insertSurvey($facultate, $an, $semestru, $materie, $prof, $review, $token);

 		echo $result;

 	}
 }

?>