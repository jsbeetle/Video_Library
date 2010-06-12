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
<img id="upl" border="0" src="upload.jpg"/>
<form id="uploadform" action="add.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<label for="title">Movie title:</label>
<input  value="" title="movie title" size="22" name="title" maxlength="255" />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
require("db_utils.php");
if(isset($_POST['title']))
  {
    
    checkAccount();
	
 } 
  
  
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
	
	
