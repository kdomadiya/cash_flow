<?php $current=8; ?>
<?php include("./include/header.php"); ?>

<?php
$name=$_SESSION['member_name'];
if($_SESSION['member_name']=='admin'){
	$_REQUEST['userrole']='a';
}
if(isset($_REQUEST['submited'])){
	$id=$_REQUEST['id'];
	$fname=$_REQUEST['firstname'];
	$lname=$_REQUEST['lastname'];
	$mno=$_REQUEST['mobileno'];
	$email=$_REQUEST['email'];
	$address=$_REQUEST['address'];
	$urole=$_REQUEST['userrole'];
	$pass=$_REQUEST['password'];

	if(empty($_REQUEST['password'])){
		mysqli_query($con, "UPDATE members SET member_fname='$fname', member_lname='$lname', member_email='$email', member_mobile='$mno', member_address='$address', member_last_update=now() WHERE member_id='$id'");
	}
	else{
		mysqli_query($con, "UPDATE members SET member_fname='$fname', member_lname='$lname', member_pass=sha1('$pass'), member_email='$email', member_mobile='$mno', member_address='$address', member_last_update=now() WHERE member_id='$id'");
	}
	header("location:users-profile.php");
	echo "<meta http-equiv='refresh' content='0,users-profile.php' />";
}
else{
	?>
	<?php

	$result=mysqli_query($con, "select * from members where member_name='$name'");
	while($row=mysqli_fetch_array($result)){
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<form method="POST" name="update-user" id="update-user" action="" onsubmit="return validation_update();">
						<div class="form-group row">
							<label for="firstname" class="col-sm-3 col-form-label">Firstname</label>
							<div class="col-sm-9">
								<input type="hidden" name="id" id="id" value="<?php echo $row['member_id']; ?>"/>
								<input type="text" name="firstname" id="firstname" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Firstname" value="<?php echo $row['member_fname']; ?>" <?php if($row['member_role'] == 'd') {echo "readonly"; } ?>>
							</div>
						</div>
						<div class="form-group row">
							<label for="lastname" class="col-sm-3 col-form-label">Lastname</label>
							<div class="col-sm-9">
								<input type="text" name="lastname" id="lastname" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Lastname" value="<?php echo $row['member_lname']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="username" class="col-sm-3 col-form-label">Username</label>
							<div class="col-sm-9">
								<input type="text" readonly name="username" id="username" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Username" value="<?php echo $row['member_name']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="mobileno" class="col-sm-3 col-form-label">Mobile Number</label>
							<div class="col-sm-9">
								<input type="text" name="mobileno" id="mobileno" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Mobile Number" value="<?php echo $row['member_mobile']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-3 col-form-label">Email Address</label>
							<div class="col-sm-9">
								<input type="text" name="email" id="email" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php echo $row['member_email']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="address" class="col-sm-3 col-form-label">Address</label>
							<div class="col-sm-9">
								<textarea name="address" id="address" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Address" ><?php echo $row['member_address']; ?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="role" class="col-sm-3 col-form-label">User Role</label>
							<div class="col-sm-9">
								<input type="text" name="role" id="role" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter User Role" value="<?php if($row['member_role']=='e'){echo "Employee";} else if($row['member_role']=='c'){echo "Client";}else{echo "Administrator";}?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="password" name="password" id="password" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Password">
							</div>
						</div>
						<div class="form-group row">
							<label for="repassword" class="col-sm-3 col-form-label">Confirm Password</label>
							<div class="col-sm-9">
								<input type="password" name="repassword" id="repassword" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-9">
								<input type="hidden" name="submited" value="1" />
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php } } ?>
		<?php include("./include/footer.php"); ?>

