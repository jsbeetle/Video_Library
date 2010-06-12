


<form   action = "mail.php" method = "POST">
		<input type = "hidden" name = "msgsent" value = "1" />
		TO:			<input type = "text" name = "to" value = "" /><br />
		SUBJECT:	<input type = "text" name = "subject" value = "" /><br />
		MESSAGE:<br />
					<textarea cols = "40" rows = "5" name = "body"></textarea><br />
		<input type = "submit" value = "submit" />
		</form>
 <?php 
require_once('class.phpmailer.php');
require('mailfunction.php');

if (isset($_POST['msgsent'])){
if (smtpmailer($_POST["to"],"volodymyrprasolov@gmail.com","volodymyrprasolov", $_POST["subject"],$_POST["body"])){
echo "Message send";
}
if (!empty($error)) echo $error;
}









 
 ?>		
		