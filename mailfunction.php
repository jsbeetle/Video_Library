  <?php

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	define('GUSER', 'volodymyrprasolov@gmail.com'); 
    define('GPWD', 'simpsonsimpson'); 
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		echo  'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		echo 'Message sent!';
		return true;
	}
}
?>