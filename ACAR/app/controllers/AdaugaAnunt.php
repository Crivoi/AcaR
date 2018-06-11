<?php
session_start();
  class AdaugaAnunt extends Controller
  {
    public function addAnunt()
    {
        $modelcon = $this->model('Model');
      
        $email = $_SESSION['email'];
        $numar_telefon = $_POST['numar_telefon'];
        $oras = $_POST['oras'];
        $judet = $_POST['judet'];
        $nume_animal = $_POST['nume_animal'];
        $tip_animal = $_POST['tip_animal'];
        $sex_animal = $_POST['sex_animal'];
        $rasa = $_POST['rasa'];
        $pret = $_POST['pret'];
        $tip_anunt = $_POST['tip_anunt'];
        $descriere = $_POST['descriere'];
        //if connected then Select Database.
        //$db=mysql_select_db("tw_2018",$con);
        $target_dir = "E:/xampp/htdocs/petrimonials/app/models/uploads/";
       
        $target_path = strval(rand(1,1000000)) . basename($_FILES["fileToUpload"]["name"]);
         $target_file = $target_dir . $target_path;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $_SESSION['Error'] = "Fisierul este o imagine - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $_SESSION['Error'] = "Fisierul incarcat nu este o imagine.";
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000000000000000) {
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
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $result = $modelcon -> insertData($email, $numar_telefon, $oras, $judet, $nume_animal, $tip_animal, $sex_animal, $rasa, $pret, $tip_anunt, $descriere, $target_path);
            
          } else 
          $result = $modelcon -> insertDataNoPic($email, $numar_telefon, $oras, $judet, $nume_animal, $tip_animal, $sex_animal, $rasa, $pret, $tip_anunt, $descriere);
        }
        $data = $modelcon -> iaID($numar_telefon, $oras, $judet, $nume_animal, $tip_animal, $sex_animal, $rasa, $pret, $tip_anunt, $descriere);
   
        $this->view('home/anuntAdaugat', $data);
        $modelcon->closeCon();
    }
  }

?>