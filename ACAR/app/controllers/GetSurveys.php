<?php

 require_once '../app/models/Model.php';

 class GetSurveys extends Controller{

    public function GetSurveysBy(){
        $modelcon = $this->model('Model');

        $jsonData = file_get_contents('php://input');
         $jsonData = json_decode($jsonData);
         $facultate = $jsonData->facultate;
         
         

        http_response_code(200);
    }

?>