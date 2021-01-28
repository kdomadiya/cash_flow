<?php

$host="localhost";
$user="root";
$pass="";
$db=  "cash-flow";

$con=mysqli_connect($host,$user,$pass,$db)or die("Could not Connect to server");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// $mysqli = new mysqli($host, $user, $pass, $db);

// if ($mysqli->connect_errno) {
// 	printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }
//$sql=mysqli_select_db($db,$con)or die("Could not Connect to Database");
//$sql=$con;


?>