 <?php
  session_start();
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
	 
	 <?php
	 require("db_utils.php");
     $con = getDbConnection();
	 $user_name=$_SESSION['user_name'];
	 $result=mysql_query("SELECT account FROM users WHERE user_name='$user_name'", $con);
	if (mysql_num_rows($result) > 0)
	  {
       $myrow=mysql_fetch_row($result);
       $account = $myrow["0"];
	  }
	  $result2=mysql_query("SELECT status FROM users WHERE user_name='$user_name'", $con);
	if (mysql_num_rows($result2) > 0)
	  {
       $myrow=mysql_fetch_row($result2);
       $status = $myrow["0"];
	  }
	  $result3=mysql_query("SELECT valid_to FROM users WHERE user_name='$user_name'", $con);
	if (mysql_num_rows($result3) > 0)
	  {
       $myrow=mysql_fetch_row($result3);
       $valid_to = $myrow["0"];
	  }
	  $valid = strftime('%H.%M %A %d %b %Y',$valid_to);
	  
	  ?>
	 
	 
		<div id="header">
		</div>
		<div align="center">
		<div id="content">
		<div id="leftcoloumn">
		<a id="logo" href="index.php">
		<img border="0" src="logo.jpg"/> </a>
		<p><b> Your current status is:</b> </p>
		<div id="stattable">
		<table id="stable" border="1">
		<tr>
		<td>
		<b>Account</b>
		</td>
		<td>
		<?php
		echo "$account";
		?>
		</td>
		</tr>
		<tr>
		<td>
		<b>Status</b>
		</td>
		<td>
		<?php
		echo "$status";
		?>
		</td>
		</tr>
		<tr>
		<td>
		<b>Valid to</b>
		</td>
		<td>
		<?php
		echo "$valid";
		?>
		</td>
		</tr>
		</table>
		</div>
		<div id="devider">
		</div>
		<p><b> Accounts:</b> </p>
		<div id="statustable">
		<table id="statable" border="1">
		<tr>
		<td>
		<b>Account</b>
		</td>
		<td>
		Free
		</td>
		<td>
		P10
		</td>
		<td>
		P20
		</td>
		<td>
		P1000
		</td>
		</tr>
		<tr>
		<td>
		<b>Uploads</b>
		</td>
		<td>
		5
		</td>
		<td>
		10
		</td>
		<td>
		20
		</td>
		<td>
		1000
		</td>
		</tr>
		<tr>
		<td>
		<b>Price</b>
		</td>
		<td>
		Free
		</td>
		<td>
		5$
		</td>
		<td>
		10$
		</td>
		<td>
		50$
		</td>
		</tr>
		<tr>
		<td>
		<b>Valid</b>
		</td>
		<td>
		1 mnth
		</td>
		<td>
		1 mnth
		</td>
		<td>
		2 mnth
		</td>
		<td>
		3 mnth
		</td>
		</tr>
		
		
		
		
		</table>
		</div>
		

			<?php
			   
			   showButton();
			   
			?>	
        </div>
		<div id="rightcoloumn">
		<img border="0" src="img.jpg"/>
		</div>
        </div>
	    </div>
	 </body>
	    </html>
