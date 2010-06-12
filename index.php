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
	<script type="text/javascript" src="javascript/jquery-1.4.2.js"></script>


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
<div id="list">
	<ul id="categorieslist">
	
	<?php
	require("db_utils.php");
$con = getDbConnection();
if(isset($_GET['id']))
{
   mysql_query("DELETE FROM movies WHERE id=".$_GET['id']);
echo "<p1 id='p1'> movie deleted </p>";
  
 } 

$result = mysql_query("SELECT * FROM movies");

while($row = mysql_fetch_array($result))
  {
  echo "<li id='record_".$row['id']."'><a href='play_movie.php?id=".$row['id']."'>".$row['title'].
  "</a> <a id='del_".$row['id']."' class='trash'  href='index.php'> <img border='0' src='trash.png' /></a></li>";
  echo "<br />";
  }
  
  

mysql_close($con);
?> 
	
     </ul>
	
</div>
<script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#list a.trash').click(deleteRecord);
            });
			
			function doDeleteRecordOnServer(movieId, functionOnSuccess, functionOnError){
				jQuery.ajax({
				   type: "GET",
				   url: "delete.php",
				   data: "id=" + movieId,
				   success: function(msg){
					 alert( "Movie deleted " + msg );
					 functionOnSuccess();
				   },
				   error: function(msg){
				    alert("Something wrong: " + msg);
				    functionOnError();
				   }
				 });
			}
			
			function doDeleteRecordFromDocument(movieId){
				jQuery("#record_"+movieId).remove();
			}
			
			function deleteRecord(){
				var movieId = this.id.substring(4, 999);	
                if(confirm("Do you really want to delete movie with id "+ movieId + "?")){
					doDeleteRecordOnServer(movieId, 
						function(){doDeleteRecordFromDocument(movieId);},
						function(){alert("Something goes wrong.");}
						) 
				}
				return false;
			}
 </script>   
 
 <div id="addnew">
<a href="add.php">Add a New Video</a>
</div>

<div id="logout">
<?php	
	 if ($user_name=$_SESSION['user_name']){
	 echo "Hello $user_name, choose video!</br>";
	 echo "<div id='logout'><a href='logout.php'> Log Out </a></div>";
	 }
	?>
</div>
<div id="time">
<?php
UploadTime();

?>
</div>	
<div id="banner">
<script type="text/javascript"><!--
google_adtest = "on";         // new line
google_ad_client = "pub-0000000000000000";

google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image";
google_ad_channel = "0000000000";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>


		</div>
		<div id="rightcoloumn">
		<img border="0" src="img.jpg"/>
		</div>
	</div>
	</div>



	</body>
	</html>
