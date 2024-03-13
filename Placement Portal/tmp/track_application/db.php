<?php
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 
	$conn=mysqli_connect($servername,$username,$password, $dbname);
	  if(!$conn){
		  die('Could not Connect MySql Server:' .mysql_error());
		}
?>Placement Portal/db.php