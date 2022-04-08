
    
<?php

include_once "db_conn.php";
include "assets/css/style.css";
// Include packages and files for PHPMailer and SMTP protocol
require 'mail\vendor\autoload.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
 
  

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }
    if (empty($phone)) {
        $errors[] = 'Phone No. is empty';
    }
    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();
    
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        $mail->Host = 'mail.kenlinksolutions.com';
        $mail->SMTPDebug  = 2;
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
        // $mail->send();
        // echo $body;
        $name = $message = $email = $phone = "";
        if($mail->send()){

            $name = $_POST['name'];
            $email = $_POST['email'];
            
            $mail  = new PHPMailer();
            // specify SMTP credentials
            $mail->isSMTP();
            $mail->Mailer = "smtp";
            $mail->Host = 'mail.kenlinksolutions.com';
            $mail->SMTPDebug  = 2;
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
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->isHTML(true);
            $mail->setFrom('info@kenlinksolutions.com', 'Kenlinks Solutions Ltd');
            $mail->Subject = 'Contact Request';
            $mail->addAddress($email);
            $mail->Body = "Hi $name, <br> Thank you for contacting <b> Kenlinks Solutions Ltd</b>, we shall get back to you soon";
            $mail->send();
            // header('Location: contact.php'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
        }
        // print $body;

    }

}

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "ken_web";
    // // Create connection
    // $conn = mysqli_connect($servername, $username, $password,$db);
    // // Check connection
    // if (!$conn) {
    // die("Connection failed: " . mysqli_connect_error());
    // }else{
    //     echo "Connected successfully";
    // }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];

    $sql_insert = "INSERT INTO contact_form (name, email, message, phone_number) 
    VALUES ('$name', '$email', '$message', '$phone')";

    // $sql_insert = "INSERT INTO users (name, email, phone) 
    // VALUES ('$name', '$email', '$phone')";

    if(mysqli_query($conn, $sql_insert)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql_insert. " . mysqli_error($conn);
    }


?>

