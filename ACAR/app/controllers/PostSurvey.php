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
		 $fileToUpload=$jsonData->fileToUpload;
         $target_dir = "C:/xampp/htdocs/ACAR/public/uploads";
         $token = $jsonData->token;
       
        $target_path = strval(rand(1,1000000)) . basename($_FILES[$fileToUpload]["name"]);
         $target_file = $target_dir . $target_path;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
            if($check !== false) {
                $_SESSION['Error'] = "Fisierul este o imagine - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $_SESSION['Error'] = "Fisierul incarcat nu este o imagine.";
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES[$fileToUpload]["size"] > 50000000000000000000) {
            $_SESSION['Error'] = "Ne pare rau, dimensiunea pozei este prea mare.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $_SESSION['Error'] = "Poza nu s-a putut incarca, doar fisierele de tip JPG, JPEG, PNG & GIF sunt permise.";
           // $uploadOk = 0;
        }
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk != 0)
		 $result = $modelcon -> insertSurvey($facultate, $an, $semestru, $materie, $prof, $review,$target_path, $token);
		 
	 }
  }
?>