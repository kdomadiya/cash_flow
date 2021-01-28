<?php
session_start();
 if(!isset($_SESSION['member_name']) && !isset($_SESSION['member_pass'])){
      header("location:login.php");
 }

//$_SESSION['member_name'] = 'jkdobariya';
//$_SESSION['member_pass'] = md5('Admin@321');

date_default_timezone_set("Asia/Calcutta");

?>
<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title></title>
	<link rel="shortcut icon" href="./images/fevicon.ico" />
	<link rel="stylesheet" href="./assets/css/jquery-ui.min.css" />
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="./assets/css/style.css" />
	<link rel="" href="" />
</head>