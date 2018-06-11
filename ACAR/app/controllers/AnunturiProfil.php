<?php
session_start();
  class AnunturiProfil extends Controller
  {
    public function anunturileMele()
    {
        $modelcon = $this->model('Model');
        
        echo json_encode($modelcon->iaAnunturiProfil($_SESSION['email']));
       
        $modelcon->closeCon();
    }
  }

?>