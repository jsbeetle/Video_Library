<?php
	session_start();
	if ($_SESSION['user_name'] == '') {
	header("location:reg.php");
	}
    ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">	
<html>
<head xmlns="http://www.w3.org/1999/xhtml">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="Title" content="Video Library">
    <meta name="Subject" content="Video Library">
    <meta name="Keywords" content="Video Library">
    <meta name="Description" content="Video Library">
	<link rel="stylesheet" href="style.css" type="text/css"/>
	

	<title> Video Library </title> 
	</head>

	<body>
	<div id="header">
	</div>
	<div align="center">
		<div id="content">
		<div id="leftcoloumn">
		<a id="logo" href="index.php">
<img border="0" src="logo.jpg"/> </a>

<p><b> Thank You for your payment! Your account has been updated!</b> </p>
<?php
 require("db_utils.php");
 $con = getDbConnection();
 $paydate = time();
$date_time_array = getdate($paydate);
$hours = $date_time_array['hours'];
$minutes = $date_time_array['minutes'];
$seconds = $date_time_array['seconds'];
$month = $date_time_array['mon'];
$day = $date_time_array['mday'];
$year = $date_time_array['year'];
 $user_name=$_SESSION['user_name'];
 $result=mysql_query("SELECT id FROM users WHERE user_name='$user_name'", $con);
	if (mysql_num_rows($result) > 0)
	  {
       $myrow=mysql_fetch_row($result);
       $id = $myrow["0"];
	  }
 $result2=mysql_query("SELECT payamount FROM payments WHERE user_id='$id'", $con);
	if (mysql_num_rows($result2) > 0)
	   {
         $myrow=mysql_fetch_row($result2);
         $payamount = $myrow["0"];
		 }
		 if ($payamount=='5')
		 {
		 $acc='P10';
		 $validtime = mktime($hours,$minutes,$seconds,$month+1,$day,$year); 
		 }
		 else if ($payamount=='10')
		 
		 {
		 $acc='P20';
		 $validtime = mktime($hours,$minutes,$seconds,$month+2,$day,$year); 
		 
		 }
		 else if ($payamount=='50')
		 {
		 $acc='P1000';
		 $validtime = mktime($hours,$minutes,$seconds,$month+3,$day,$year); 
		 }
	 $ok = 'OK';
	 mysql_query("UPDATE Users SET Account='$acc' WHERE user_name='$user_name'");
	 mysql_query("UPDATE Users SET Status='$ok' WHERE user_name='$user_name'");
	 mysql_query("UPDATE Users SET valid_to='$validtime' WHERE user_name='$user_name'");









?>

<div id="back">
<script type="text/javascript">
function goBack()
  {
  window.history.back()
  }
</script>
<a href="javascript:goBack()">Back</a>
</div>

 	

		</div>
		<div id="rightcoloumn">
		<img border="0" src="img.jpg"/>
		</div>

</div>
	</div>
</body>
	</html>
	
	
