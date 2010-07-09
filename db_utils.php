
 <?php

function getDbConnection ()
{
$con = mysql_connect("localhost","root","simpson");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("video_library", $con);
  return $con;
 }

 
 
// Insert a record about a user into database

function writeUserInDatabase($user_name1, $password1, $user_email1,$regtime1,$account1){
$con = getDbConnection();
mysql_query("INSERT INTO users (user_name,password,user_email,regdate,account) VALUES ('$user_name1', '$password1 ', '$user_email1 ','$regtime1','$account1')");
mysql_close($con);
var_dump($regtime1);
}



// Insert a record about a file into database
function writeNoteInDatabase($file_name1, $title1, $user_name1){
$con = getDbConnection();

mysql_query("INSERT INTO movies (file_name, title, user_name) VALUES ('$file_name1', '$title1 ', '$user_name1')");
mysql_close($con);
}


function uploadFile () {
if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    

    if (file_exists("media/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "media/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "media/" . $_FILES["file"]["name"];
      }
    }

// Make a note about uploaded file in current database

writeNoteInDatabase("media/" . $_FILES["file"]["name"] , $_POST["title"], $_SESSION["user_name"]);



}

// check dada

function checkData($user_name,$password,$user_email) {
	
	$user_name = trim($user_name);
	$password = trim($password);
	$user_email = trim($user_email);
    
	if ( !ereg ("[A-Za-z' -]{1,50}", $user_name))
	{ 
		echo 'Incorrect Name<br />';
		return false;
	}
	if( !ereg ("[A-Za-z0-9' -]{1,50}", $password))
	{ 
		echo 'Incorrect Password<br />';
		return false;
	}
	if ( !eregi ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $user_email))         
	{ 
		echo 'Incorrect Email<br />';
		return false;
	}

	
	return true;
}


// write Congratulation
 function writeCongratulation($user_name){
echo "Thanks for registration $user_name !";
}

// Check Login
function checkLogin($user_name,$password)
{
$con = getDbConnection();
$user = addslashes($user_name);
$pass = md5($password);
$result=mysql_query("SELECT * FROM users WHERE user_name='$user' AND password='$pass'", $con);
$rowCheck = mysql_num_rows($result);

if($rowCheck > 0){
while($row = mysql_fetch_array($result)){

  return true;
  }
}
}
// Date Function
     function UploadTime()
	   {  
	     

// забирает текущее время в массив
$timestamp = time();
echo strftime('%H.%M %A %d %b',$timestamp);
echo '<p>';
$date_time_array = getdate($timestamp);

$hours = $date_time_array['hours'];
$minutes = $date_time_array['minutes'];
$seconds = $date_time_array['seconds'];
$month = $date_time_array['mon'];
$day = $date_time_array['mday'];
$year = $date_time_array['year'];

// используйте mktime для обновления UNIX времени
// добавление 19 часов к $hours
$timestamp2 = mktime($hours,$minutes,$seconds,$month+1,$day,$year);
echo strftime('%H.%M %A %d %b',$timestamp2);
if ($timestamp==$timestamp2)
 {
 $count=0;
 }

 }



// проверка аккаунта
function checkAccount()
{
    $con = getDbConnection();
    $user_name=$_SESSION['user_name'];
    $result=mysql_query("SELECT COUNT(file_name)AS count FROM movies WHERE user_name='$user_name'", $con);
    if (mysql_num_rows($result) > 0)
	  {
       $myrow=mysql_fetch_row($result);
       $count = $myrow["0"];
	  }
    $result2=mysql_query("SELECT account FROM users WHERE user_name='$user_name'", $con);
	if (mysql_num_rows($result2) > 0)
	   {
         $myrow=mysql_fetch_row($result2);
         $account = $myrow["0"];
		 var_dump($account);
        }
    if ($account == 'Free')
	{
	 if ($count<5)
	     {
         uploadFile ();
         }  
		 else 
		 {
		 echo "Sorry your limit is over";
		 }
    }
     if ($account == 'Payment')
	 {    echo "<div id='paybutton'>

<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='business' value='Boss_1277114077_biz@gmail.com'>
<input type='hidden' name='hosted_button_id' value='E8HBPVSV729BY'>
<table>
<tr><td><input type='hidden' name='on0' value='Videos'>Get More Uploads!</td></tr><tr><td><select name='os0'>
	<option value='up to 10 videos'>up to 10 videos $5.00</option>
	<option value='up to 20 videos'>up to 20 videos $10.00</option>
	<option value='up to 1000 videos'>up to 1000 videos $50.00</option>
</select> </td></tr>
</table>
<input type='hidden' name='currency_code' value='USD'>
<input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<input type='hidden' name='return' value='http://173.203.93.235/vl/add.php'>
<input type='hidden' name='cancel_return' value='http://173.203.93.235/vl/logout.php'>
<input type='hidden' name='notify_url' value='http://173.203.93.235/vl/ipn.php'>
<img alt='' border='0' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>



</div>";
		 if ($count<10)
	     {
         uploadFile ();
         }  
		 else 
		 {
		 echo "Sorry your limit is over";
		 }
		 
		 
		 
    }
}







?>