<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'robot93270@gmail.com';
        $mail->Password   = 'koqpslya gtma etbd';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('robot93270@gmail.com', $_POST['name']);
        $mail->addReplyTo($_POST['email'], $_POST['name']);
        $mail->addAddress('rida59220@hotmail.fr');

        $mail->isHTML(false);
        $mail->Subject = $_POST['subject'];
        $mail->Body    = "Nom: {$_POST['name']}\nEmail: {$_POST['email']}\nMessage:\n{$_POST['message']}";

        $mail->send();

        // ✅ renvoyer "OK" pour que JS affiche .sent-message
        echo 'OK';

    } catch (Exception $e) {
        // Ici on renvoie l’erreur pour que JS affiche .error-message
        echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
    }
}
?>
