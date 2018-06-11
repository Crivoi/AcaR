
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // not required
    $comments = $_POST['comments']; // required
 
    $email_message = "Detalii formular:\n\n";

    $email_message .= "Prenume: ".$first_name."\n";
    $email_message .= "Nume: ".$last_name."\n";
    $email_message .= "Email: ".$email_from."\n";
    $email_message .= "Subiect: ".$subject."\n";
    $email_message .= "Detalii: ".$comments."\n";

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'petrimoniale@gmail.com';
$mail->Password = 'doru1234';
$mail->SetFrom('no-reply@howcode.org');
$mail->Subject = 'Formular contact';
$mail->Body = $email_message;
$mail->AddAddress('petrimoniale@gmail.com');

$mail->Send();
?>

<!-- include your own success html here -->
<!DOCTYPE html>
<html min-height="100%">
  <head>
    <title>Contacteaza-ne</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" defer></script>

    <style>
     
      button{
        background-color: #E84A5F;
      }
      
      .contact-form-container {
          float:left;
          background-color: #ffffff;
          padding: 5% 5% 0 5%;
          width: 45%;
          max-height: 100% !important;
      }
      
      .bg {
        background-image: url("https://cdn.glitch.com/fb12d49e-1df5-4752-a09a-efc4da5a070c%2FdoggoBGSmall.png?1521023455801");
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      
      @media screen and (max-width: 1000px){
        .bg{
          background: none;
        }
        .contact-form-container{
          width:100%;
          
        }
      }

    </style>
  </head>
  
  <body>
<header class="navigation-bar">
      <a  href="home.html">
        <img class="logo" src="https://cdn.glitch.com/fb12d49e-1df5-4752-a09a-efc4da5a070c%2FpetrimonialeALB2.png?1520622937853" height = "35px" >
      </a>
    
      <a class="bar-item" href="monte.html">Monte</a>
      <a class="bar-item" href="pui2.html">Vanzari pui</a>
      <a class="bar-item" href="anunt.html">Adauga anunt</a>
      <a class="bar-item" href="contact.html">Contact</a>
     
      <!--Login/signup Menu-->
      <div class="dropdown" style="float:right;">
          <button class="dropbtn"><i class="fa fa-reorder"></i></button>
          <div class="dropdown-content">
             <button onclick="document.getElementById('login').style.display='block'" class="barbtn">Logare</button>
             <button onclick="document.getElementById('signup').style.display='block'" class="barbtn">Inregistrare</button>
          </div>
      </div>  
      
      <!--Search Menu-->
      <div class="dropdown" style="float:right;">
          <button class="dropbtn"><i class="fa fa-search"></i></button>
            <div class="search-bar"> 
                
              <div class="search-crit">
                  <button style="background-color:#2A363B;"><i class="fa fa-search"></i></button>
              </div>    
              
              <div class="search-crit">
                <select>
                    <option value="0">Categorie</option>
                    <option value="Monte">Monte</option>
                    <option value="Vanzari">Vanzari</option>
                    <option value="Adoptii">Adoptii</option>
                </select>
              </div>
              
              <div class="search-crit">
                <input type="text" placeholder="Cauta aici">
              </div>
  
            </div>
      </div>  
    </header>
 <hr style="width:100%; color:white; border-color:white;">


    
    <div style="padding: 100px">
  <h2>
  
   Va multumim ca ne-ati contactat. </h2> <h3>
   Va vom raspunde in cel mai scurt timp posibil!
    </h3> 
    </div>
    
   
    </body>
</html>

 
 
