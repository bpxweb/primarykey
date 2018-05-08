<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php

/***
		require_once('PHPMailer_v5.0.2/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsHTML(true);
        $mail->IsSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        //$mail->SMTPSecure = ""; // sets the prefix to the servier
        $mail->Host = "mail.primarykey.me"; // sets as the SMTP server
        $mail->Port = 587; // set the SMTP port for the server
        $mail->Username = "primarykey@primarykey.me"; // username
        $mail->Password = "EsrG!4_6mS"; // password
        $mail->From = "primarykey@primarykey.me"; // "name@yourdomain.com";
        $mail->FromName = "PRIMARYTEST";  // set from Name
        $mail->Subject = "Test sending mail.";
        $mail->Body = "Test Mail Description";
        $mail->AddAddress("primarykey@primarykey.me", "Weerachai Nukitram"); // to Address
        $mail->Send(); 


        */

require_once('PHPMailer_v5.0.2/class.phpmailer.php');
$mail = new PHPMailer();

$body = $_POST[‘message’]. " ติดต่อ :".$_POST[‘tel’];//รับค่า POST

$mail->CharSet = 'utf-8';
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->Host = 'mail.primarykey.me'; // SMTP server
$mail->Port = 587; // พอร์ท
$mail->Username = "primarykey"; // username
$mail->Password = "EsrG!4_6mS"; // password
$mail->SetFrom('primarykey@primarykey.me', 'wittbuyt');
$mail->AddReplyTo('primarykey@primarykey.me', 'wittbuyt');
$mail->Subject = 'ติดต่อจากลูกค้า : '. $_POST[‘fullname’].' ติดต่อ : '.$_POST[‘tel’];//รับค่า POST

$mail->MsgHTML($body);

$mail->AddAddress($_POST[’email’], $_POST[‘fullname’]); // ผู้รับคนที่หนึ่ง
$mail->AddAddress('primarykey@primarykey.me', $_POST[‘fullname’]); // ผู้รับคนที่สอง //รับค่า POST

if(!$mail->Send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Message sent!';
}

?>
</body>
</html>