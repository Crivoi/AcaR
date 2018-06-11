
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

class TrimiteEmail extends Controller{

  public function trimite()
  {
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

      $this->view('home/emailTrimis');
      
  }

}
?>

