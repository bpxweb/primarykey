<?php
// Configure your Subject Prefix and Recipient here
require_once('PHPMailer_v5.0.2/class.phpmailer.php');
$mail = new PHPMailer();
$subjectPrefix = '[Contact via website]';
//$emailTo       = '<patpjr@gmail.com>';
$errors = array(); // array to hold validation errors
$data   = array(); // array to pass back data
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = stripslashes(trim($_POST['name']));
    $email   = stripslashes(trim($_POST['email']));
    $subject = stripslashes(trim($_POST['subject']));
    $message = stripslashes(trim($_POST['message']));
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is invalid.';
    }
    if (empty($subject)) {
        $errors['subject'] = 'Subject is required.';
    }
    if (empty($message)) {
        $errors['message'] = 'Message is required.';
    }

    //check recaptcha
    if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeatlUUAAAAAMcI2Bb37x_dHO3W05gq2S2m28Gt&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }
        else
        {
          echo '<h2>Thanks for posting comment.</h2>';
        }
    // if there are any errors in our errors array, return a success boolean or false
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        $subject = "$subjectPrefix $subject";
        $body    = '
            <strong>Name: </strong>'.$name.'<br />
            <strong>Email: </strong>'.$email.'<br />
            <strong>Message: </strong>'.nl2br($message).'<br />
        ';
        $headers  = "MIME-Version: 1.1" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
        $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
        $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
        $headers .= "From: " . "=?UTF-8?B?".base64_encode($name)."?=" . "<$email>" . PHP_EOL;
       //$headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
        $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;
        //mail($emailTo, "=?utf-8?B?" . base64_encode($subject) . "?=", $body, $headers);

        $mail->CharSet = 'utf-8';
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Host = 'mail.primarykey.me'; // SMTP server
        $mail->Port = 587; // พอร์ท
        $mail->Username = "primarykey"; // username
        $mail->Password = "YHmqUQ_KWY8Z_!y"; // password
        $mail->SetFrom('primarykey@primarykey.me', 'Primary Key Website Creative');
        $mail->AddReplyTo('primarykey@primarykey.me', 'Primary Key Website Creative');
        $mail->Subject = $subject.' ติดต่อจากลูกค้า : '. $name;//รับค่า POST

        $mail->MsgHTML($body.$headers);

        $mail->AddAddress($email, $name); // ผู้รับคนที่หนึ่ง
        $mail->AddAddress('primarykey@primarykey.me', $name); // ผู้รับคนที่สอง //รับค่า POST
            if(!$mail->Send()) {
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                $data['success'] = false;
                $data['errors']  = $errors.'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                //echo 'Message sent!';
                $data['success'] = true;
                $data['message'] = 'Congratulations. Your message has been sent successfully';
            }

        
    }
    // return all our data to an AJAX call
    echo json_encode($data);
}


?>


