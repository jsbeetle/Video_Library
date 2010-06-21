
 <?php
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

// post back to PayPal system to validate
	
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
 
	// If testing on Sandbox use: 
	// $header .= "Host: www.sandbox.paypal.com:443\r\n";
$header .= "Host: www.paypal.com:443\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

	// If testing on Sandbox use:
	//$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

// assign posted variables to local variables
$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];

//set email variables
$From_email = "From: user@com.ua";
$Subject_line = "PayPal";

$email_msg = "Thanks for purchasing my item. Your order will be delivered in 3-4 days. We appreciate your business.";
$email_msg .= "\n\nThe details of your order are as follows:";
$email_msg .= "\n\n" . "Transaction ID: " .  $txn_id ;
$email_msg .= "\n" . "Payment Date: " . $payment_date;

if (!$fp) {
// HTTP ERROR
} else {
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) {
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process payment

$mail_From = $From_email;
$mail_To = $payer_email;
$mail_Subject = $Subject_line;
$mail_Body = $email_msg;

mail($mail_To, $mail_Subject, $mail_Body, $mail_From);


}
else if (strcmp ($res, "INVALID") == 0) {
// log for manual investigation

$mail_From = $From_email;
$mail_To = $receiver_email;
$mail_Subject = "INVALID IPN POST";
$mail_Body = "INVALID IPN POST. The raw POST string is below.\n\n" . $req;

mail($mail_To, $mail_Subject, $mail_Body, $mail_From);

}
}
fclose ($fp);
}
?>

