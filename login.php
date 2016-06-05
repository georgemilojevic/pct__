<?php

require "config.php";
if( empty ($_POST['name']) || empty ($_POST['password']) ) {
	die("<script> alert('You forgot to enter Username or Password'); window.location='homepage.php' </script>");
}	
$username = $_POST['name'];
$password = $_POST['password'];  
$username = str_replace("'","",$username);
$username = str_replace("-","",$username);
$password = str_replace("'","",$password);
$password = str_replace("-","",$password);

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME); 
$q = "select * from users where name='{$username}' and password='{$password}' limit 1";
 
$res = mysqli_query($conn,$q);
$user = mysqli_fetch_object($res);
if($user){
	session_start();
	$_SESSION['status'] = $user->name;
	header("location: homepage.php");
} else {
	
	echo "<script> alert('Username or Password mismatch. Please try again'); window.location='homepage.php'</script>";
}