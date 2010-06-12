<?php
	session_start();
	if ($_SESSION['user_name'] == '') {
	echo "Acces denied";
	}
    ?>


		<?php
 require("db_utils.php");
$con = getDbConnection();

mysql_query("DELETE FROM movies WHERE id=".$_GET['id']);

?> 


	







