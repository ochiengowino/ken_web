<?php  
require_once "config.php";
// Include packages and files for PHPMailer and SMTP protocol
require 'mail\vendor\autoload.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$contact = new Database();


//Handle send contact Ajax request
if(isset($_POST['action']) && $_POST['action'] == 'sendContact'){
    // print_r($_POST);
    $name = $contact->test_input($_POST['name']);
    $email = $contact->test_input($_POST['email']);
    $phone = $contact->test_input($_POST['phone']);
    $message = $contact->test_input($_POST['message']);

    $contact->contact_details($name, $email, $phone, $message);

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
    $mail->Body    = "Hi $name, <br> Thank you for contacting <b> Kenlinks Solutions Ltd</b>, we shall get back to you soon";
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
        $mail->Subject = 'New message from Kenlinks Website';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["<div style='text-align: center; background-color: #0c08f7; height:120px;><b>Name:</b> {$name}</div>", "<div><b>Email:</b> {$email}</div>", "<div><b>Phone No.:</b> {$phone}</div>","<div><b>Message:</b>", nl2br($message),"</div>"];
        $body = join('<br />', $bodyParagraphs);
        // $body = join(PHP_EOL, $bodyParagraphs);
        $mail->Body = $body;
        $mail->send();
    }

}









?>