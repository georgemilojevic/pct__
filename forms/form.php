<?php

require "../config.php";
if( empty ($_POST['name']) || empty ($_POST['password']) ) {
	die("<script> alert('You forgot to enter Username or Password'); window.location='../index.php' </script>");
}	
$username = $_POST['name'];
$password = $_POST['password'];  
$username = str_replace("'","",$username);
$username = str_replace("-","",$username);
$password = str_replace("'","",$password);
$password = str_replace("-","",$password);

$conn = new mysqli("localhost","root","","store");
$q = "select * from users where name='{$username}' and password='{$password}' limit 1";
 
$res = mysqli_query($conn,$q);
$user = mysqli_fetch_object($res);
if($user){
	Session::startSession();
	$_SESSION['status'] = $user->name;
	
	
	header ("location: ../index.php");
} else {
	
	echo "<script> alert('Username or Password mismatch. Please try again'); window.location='../index.php'</script>";
}












