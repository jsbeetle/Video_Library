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
		<p> LOGIN </p>
		<table id="login">
        <form action="login.php" method="post">
		<tr>
		<td>Name</td>
		<td><input type="text" name="user_name" value="<?php if(isset($_POST['submit'])){ echo $_POST['user_name'];} ?>" ></td>
		</tr>
		<tr>
		<td>Password</td>
		<td><input type="password" name="password" ></td>
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
              if (checkLogin ($_POST["user_name"] , $_POST["password"]))
              {
			 
			  $_SESSION['user_name']= $_POST['user_name'];
			  header("location:index.php");
			  }
              
               else 
             { 
			 
                 echo "Invalid Name or Password";
              }
			}
			   
			?>	
        </div>
		<div id="rightcoloumn">
		<img border="0" src="img.jpg"/>
		</div>
        </div>
	    </div>
	 </body>
	    </html>
