<?php
	class GetAnunt extends Controller{
		public function getAnunturiPui(){
			$modelcon = $this->model('Model');
			echo json_encode($modelcon->getCards("vanzari"));
			http_response_code(200);
		}

		public function getAnunturiMonte(){
			$modelcon = $this->model('Model');
			echo json_encode($modelcon->getCards("monte"));
			http_response_code(200);
		}

		public function filtreazaAnunturiVanzari(){
			$modelcon = $this->model('Model');

			$jsonData = file_get_contents('php://input');
 			$jsonData = json_decode($jsonData);
 			$gender = $jsonData->gender;
 			$pret = $jsonData->pret;
 			$tip = $jsonData->tip;
 			if(array_key_exists("rasa", $jsonData))
 			{
 				$rasa = $jsonData->rasa;
 				if(array_key_exists("locatie", $jsonData))
 				{
 					$locatie = $jsonData->locatie;
 					echo json_encode($modelcon->getFilteredCards1("vanzari",$gender,$pret,$tip,$rasa,$locatie));
 				} else {
 					echo json_encode($modelcon->getFilteredCards2("vanzari",$gender,$pret,$tip,$rasa));
 				}
 			}else{
 				if(array_key_exists("locatie", $jsonData))
 				{
 					$locatie = $jsonData->locatie;
 					echo json_encode($modelcon->getFilteredCards3("vanzari",$gender,$pret,$tip,$locatie));
 				} else {
 					echo json_encode($modelcon->getFilteredCards4("vanzari",$gender,$pret,$tip));
 				}
 			}

			http_response_code(200);
		}

		public function filtreazaAnunturiMonte(){
			$modelcon = $this->model('Model');

			$jsonData = file_get_contents('php://input');
 			$jsonData = json_decode($jsonData);
 			$gender = $jsonData->gender;
 			$pret = $jsonData->pret;
 			$tip = $jsonData->tip;
 			if(array_key_exists("rasa", $jsonData))
 			{
 				$rasa = $jsonData->rasa;
 				if(array_key_exists("locatie", $jsonData))
 				{
 					$locatie = $jsonData->locatie;
 					echo json_encode($modelcon->getFilteredCards1("monte",$gender,$pret,$tip,$rasa,$locatie));
 				} else {
 					echo json_encode($modelcon->getFilteredCards2("monte",$gender,$pret,$tip,$rasa));
 				}
 			}else{
 				if(array_key_exists("locatie", $jsonData))
 				{
 					$locatie = $jsonData->locatie;
 					echo json_encode($modelcon->getFilteredCards3("monte",$gender,$pret,$tip,$locatie));
 				} else {
 					echo json_encode($modelcon->getFilteredCards4("monte",$gender,$pret,$tip));
 				}
 			}

			http_response_code(200);
		}

	}

?>