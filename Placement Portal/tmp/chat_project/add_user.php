<?php

include "config.php";

if($_POST)
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	// $number=$_POST['number'];
	// $address=$_POST['address'];
	
	$sql="INSERT INTO `register`(`name`, `email`, `password`) VALUES ('".$name."','".$email."','".$password."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		session_start();
		$_SESSION['name'] = $name;
		header('Location: home.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>