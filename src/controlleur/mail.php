<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "$racine/PHPMailer/src/Exception.php";
require "$racine/PHPMailer/src/PHPMailer.php";
require "$racine/PHPMailer/src/SMTP.php";


function envoyerEmail($mailEntreprise, $nomEntreprise, $nom, $message) {



$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'bravo.roess@gmail.com';
    $mail->Password = 'ndhnkuwqpgbdloic';

    // Expéditeur et destinataire
    $mail->setFrom('bravo.roess@gmail.com', 'Bravo');
    $mail->addAddress($mailEntreprise, $nomEntreprise);

    // Contenu de l'e-mail
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->AddCustomHeader("Content-Type: text/html; charset=UTF-8");
    $mail->Subject = $nom.' a postulé à votre annonce';
    $mail->Body = $message;

    // Envoi de l'e-mail
    $mail->send();
    return 'L\'e-mail a été envoyé avec succès.';
    } catch (Exception $e) {
        return "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }

}

?>