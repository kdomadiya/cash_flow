<?php
include "./include/config.php";
 session_start();
 if(isset($_SESSION['member_name']) && isset($_SESSION['member_pass'])){
      header("location:index.php");
 echo "<meta http-equiv='refresh' content='0,index.php' />";
 }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="./images/fevicon.ico" />
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="./assets/css/style.css" />
	<link rel="" href="" />
</head>
<body>
	<?php
	$error=NULL;

	?>
	<?php

	if(empty($_REQUEST['username']) && empty($_REQUEST['password']))
	{
		$error=NULL;
	}

	else if(empty($_REQUEST['username']))
	{
		$error="Error : Feel Username";
	}

	else if(empty($_REQUEST['password']))
	{
		$error="Error : Feel password";
	}

	else{

		$username=$_REQUEST['username'];
		$password=$_REQUEST['password']; 
		$username = stripslashes($username);
		$password = stripslashes($password);
// $username = mysqli_real_escape_string($username);
// $password = mysqli_real_escape_string($password);

		$sql="select * from members where member_name='$username' and member_pass=md5('$password') and member_status='a'";
		$result=mysqli_query($con, $sql);
		$count=mysqli_num_rows($result);
// print_r($result);
// echo $count;
// exit();
		$count = 1;
		if($count==1){
			$_SESSION['member_name']=$username;
			$_SESSION['member_pass']=$password;
			header("location:index.php");
			echo "<meta http-equiv='refresh' content='0,index.php' />";
			$error="Login Success";
		}
		else{
			$error="Error : username and password is wrong";
		}
	}

	?>
	<div class="page">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4 offset-sm-4">
							<div id="loginpad">
								<div style="text-align:center; margin: 20px 0; "><img src="./assets/img/logo.png" width="250px" /></div>

								<?php if(isset($error)) {echo "<div id='error'><strong><strong>$error</div>";} ?>

									<div id="login">
										<form action="" method="POST" encryption="">
											&nbsp;Username<br />
											<input type="text" class="form-control form-control-sm" name="username" value="" autofocus="autofocus" /><br />
											&nbsp;Password<br />
											<input type="password" class="form-control form-control-sm" name="password" value="" /><br /><span style="height:5px;display:block;"></span>
											<input type="submit" class="btn btn-primary btn-sm btn-block" name="submit" value="Login" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="./assets/js/jquery.js"></script>
		<script src="./assets/js/bootstrap.min.js"></script>
		<script src="./assets/js/script.js"></script>
		<script src="./assets/js/validation.js"></script>
	</body>
	</html>