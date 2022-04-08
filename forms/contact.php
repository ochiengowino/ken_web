<?php
//  require("PHPMailer-master/src/PHPMailer.php");
//  require("PHPMailer-master/src/SMTP.php");
//  require("PHPMailer-master/src/Exception.php");
// // use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ . '/autoload.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// Include packages and files for PHPMailer and SMTP protocol

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer-master/PHPMailerAutoload.php';
$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }
    // print $name;

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();
        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        $mail->Host = 'mail.kenlinksolutions.com';
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Username = 'bochieng@kenlinksolutions.com';
        $mail->Password = 'benja@1234';
        $mail->SMTPSecure = 'ssl/tls';
        $mail->Port = 25;
        $mail->setFrom($email);
        $mail->addAddress('bochieng@kenlinksolutions.com');
        $mail->Subject = 'New message from your website';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
        // $body = join('<br />', $bodyParagraphs);
        $body = join(PHP_EOL, $bodyParagraphs);
        $mail->Body = $body;
        $mail->send();
        // echo $body;
        $name = $message = $email = "";
        if($mail->send()){

            header('Location: contact.html'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
        }

        
        // print $body;
    }
}


?>