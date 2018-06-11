<?php
  class Anunturi extends Controller
  {
    public function get($id = '')
    {
        $modelcon = $this->model('Model');
      
        $anuntCurent = $modelcon->iaAnunt($id);
        $anunturiSimilare = $modelcon->iaAnuntSimilar($anuntCurent);
        shuffle($anunturiSimilare);

        $i=0;
        $data = [];
        array_push($data, $anuntCurent);
        foreach ($anunturiSimilare as $anunt) {
          array_push($data, $anunt);
          $i += 1;
        }

        while($i < 4){
          $i += 1;
          array_push($data, $anuntCurent);
        }
        $this->view('home/anunturi', $data);
        $modelcon->closeCon();
    }
  }

?>