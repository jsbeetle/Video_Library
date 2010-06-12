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
	<div id="header">
	</div>
	<div align="center">
		<div id="content">
		<div id="leftcoloumn">
		<a id="logo" href="index.php">
<img border="0" src="logo.jpg"/> </a>
 <p> REGISTRATION </p>
<table id="registration">
 
      <form action="reg.php" method="post">
      <tr>
      <td>Name</td>
      <td><input type="text" name="user_name" ></td>
      </tr>
      <tr>
      <td>Password</td>
      <td><input type="password" name="password" ></td>
      </tr>
	  <tr>
      <td>Confirm Password</td>
      <td><input type="password" name="password2" ></td>
      </tr>
      <td>Email</td>
      <td><input type="text" name="user_email"></td>
      </tr>
	  <tr>
      <td>Account</td>
      <td>
	  <select name="account">
      <option>Free</option>
      <option>Payment</option>
      </select>
      </td>
      </tr>
      <tr>
      <td align="right" colspan="2"><input type="submit" value="Submit" name="submit" ></td>
      </tr>
	  
 
      </form>
	  
      </table>
		<?php
		require("db_utils.php");
        
		if(isset($_POST['submit']))
		{
       if($_POST['password'] == $_POST['password2'])
{		
		if (checkData($_POST["user_name"] , $_POST["password"], $_POST["user_email"])) {
        $regtime = time();
		writeUserInDatabase($_POST["user_name"] , $_POST["password"], $_POST["user_email"],$regtime, $_POST["account"]);
	    $_SESSION['user_name']= $_POST['user_name'];
		header ("location: index.php");
		}
     
}
else {echo "<p>Passwords don't match.  
        Please try again.</p>";
		} 
          }
		?> 

	 
        <div id="alreadyreg">
		<a href="login.php">Already registered? Please Login! </a>
		</div>
		</div>
		
		<div id="rightcoloumn">
		<img border="0" src="img.jpg"/>
		</div>


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	</div>
	</body>
	</html>
