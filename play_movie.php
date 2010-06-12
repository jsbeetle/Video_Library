<?php
	session_start();
	if ($_SESSION['user_name'] == '') {
	header("location:reg.php");
	}
    ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">	

<?php
require("db_utils.php");
$con = getDbConnection();
$result = mysql_query("SELECT * FROM movies WHERE id=".$_GET['id']);
$row = mysql_fetch_array($result);
$file_name = $row['file_name'];
?>







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
<p id='preview'>The player will show in this paragraph</p>
<script type='text/javascript' src='/mp/swfobject.js'></script>
<script type='text/javascript'>
var s1 = new SWFObject('<?php echo $file_name;?>','player','400','300','9');
s1.addParam('allowfullscreen','true');
s1.addParam('allowscriptaccess','always');
s1.addParam('flashvars','file=/mp/video.flv');
s1.write('preview');
</script> 
<div id="back">
<script type="text/javascript">
function goBack()
  {
  window.history.back()
  }
</script>
<a href="javascript:goBack()">back</a>
</div>

 	

		</div>
		<div id="rightcoloumn">
		<img border="0" src="img.jpg"/>
		</div>


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	</div>



















</body>
	</html>