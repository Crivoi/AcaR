<?php

 require_once '../app/models/Model.php';

 class GetSurveys extends Controller{

    public function GetSurveysBy(){
        $modelcon = $this->model('Model');

        $jsonData = file_get_contents('php://input');
        $jsonData = json_decode($jsonData);
        $facultate = $jsonData->facultate;
        $materie = $jsonData->materie;
        $profesor = $jsonData->profesor;
        
        echo json_encode($modelcon->getFilteredSurveys($facultate, $materie, $profesor));

        http_response_code(200);
    }
 }
?>