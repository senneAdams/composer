<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';

$mail = new PHPMailer(true);
if(isset($_POST['submit'])) {
    try {
        $email = $_POST['email'];
        $naam = $_POST['name'];
        $klacht = $_POST['klacht'];


        //Server settings
        $mail->SMTPDebug = '2';                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = '97ec70862fede6';                     //SMTP username
        $mail->Password = 'f36474cb21c070';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 25 or 465 or 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('senne.adams@ictmbo.nl', 'senne');
        $mail->addAddress($email);     //Add a recipient
        $mail->addCC('senne.adams@ictmbo.nl');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Uw klacht is in behandeling';
        $mail->Body = $klacht;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form method="post" action=" ">
    <label for="naam">naam:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br><br>
    <label for="klacht">Klacht:</label><br>
    <input type="text" id="klacht" name="klacht"><br><br>
    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>
