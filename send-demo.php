<?php
// Include packages and files for PHPMailer and SMTP protocol

require_once "config.php";
require __DIR__ . '\mail\vendor\autoload.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$demo = new Database();

//Handle send demo Ajax request
if(isset($_POST['action']) && $_POST['action'] == 'sendDemo'){
//    print_r($_POST);
    $name = $demo->test_input($_POST['name']);
    $email = $demo->test_input($_POST['email']);
    $phone = $demo->test_input($_POST['phone']);
    $date = $demo->test_input(date("Y-m-d", strtotime($_POST['date'])));
    // $date = $contact->test_input($_POST['date']);
    $message = $demo->test_input($_POST['message']);
    $uniqueID = rand(1000,100000);

    $demo->demo_details($uniqueID, $name, $email, $phone, $date, $message);

    $mail = new PHPMailer(true);
    
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();    
    $mail->Mailer = "smtp";                                       
    $mail->Host = 'mail.kenlinksolutions.com';                   
    $mail->SMTPAuth   = true;  
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

    //Recipients
    $mail->setFrom('info@kenlinksolutions.com','Kenlinks Solutions Ltd');
    $mail->addAddress($email);     
    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Contact Request';
    $mail->Body = "Hi $name, <br> Thank you for contacting <b> Kenlinks Solutions Ltd</b>, we will get back to you on <b>$date</b> as requested";
    // $mail->send();


    if($mail->send()){
        $mail  = new PHPMailer();
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        $mail->Host = 'mail.kenlinksolutions.com';
        $mail->SMTPDebug  = 0;
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
        $mail->setFrom($email, $name);
        $mail->addAddress('bochieng@kenlinksolutions.com');
        $mail->Subject = 'SayVU Demo Request';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = [ "<b>Reference Number:</b> {$uniqueID}","<b>Name:</b> {$name}", "<b>Email:</b> {$email}", "<b>Phone No.:</b> {$phone}", "<b>Date:</b> {$date}", "<b>Message:</b>", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
      
        $mail->Body = $body;
        $mail->send();
    }
}


?>  