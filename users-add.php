<?php $current=6; ?>
<?php include("./include/header.php"); ?>

<?php 
if($role!='a' && $role!='e'){
	echo "<div style='width:800px; margin:20px auto; border:0px solid #ff0000;'><b>Sorry...</b> You have no perivilage to visit this page.</div>";
	exit();
}
?>

<?php


if(empty($_REQUEST['userrole'])){
	$_REQUEST['userrole']=NULL;
}

if(isset($_REQUEST['submited'])){

// $getdata = array();

// foreach ($_REQUEST as $key => $value) {
// 	$getdata[$key] = $value;
// }

// unset($getdata['submit']);

// print_r($getdata);
// exit();


	$fname=$_REQUEST['firstname'];
	$lname=$_REQUEST['lastname'];
	$uname=$_REQUEST['username'];
	$mno=$_REQUEST['mobileno'];
	$email=$_REQUEST['email'];
	$address=$_REQUEST['address'];
	$urole=$_REQUEST['userrole'];
	$pass=$_REQUEST['password'];
	
	mysqli_query($con, "INSERT INTO members (member_fname,member_lname,member_name,member_pass,member_email,member_mobile,member_address,member_role,member_last_update) values ('$fname','$lname','$uname',sha1('$pass'),'$email','$mno','$address','$urole',now())")or die(mysqli_error($con));
	header("location:users.php");
	echo "<meta http-equiv='refresh' content='0,users.php' />";
}

else{
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<form method="POST" name="update-user" id="update-user" action="" onsubmit="return validation_update();" class="needs-validation" novalidate autocomplete="off">
					<input type="hidden" name="id" id="id" value="<?php echo $row['member_id']; ?>"/>
					<!-- Start Firstname -->
					<div class="form-group row">
						<label for="firstname" class="col-sm-3 col-form-label">Firstname</label>
						<div class="col-sm-9">
							<input type="text" pattern="^[A-Za-z]{3,}$" name="firstname" id="firstname" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Firstname" value="<?php echo $row['member_fname']; ?>" <?php if($row['member_role'] == 'd') {echo "readonly"; } ?> required>
							<div class="invalid-feedback">Please provide a Firstname</div>
						</div>
					</div><!-- End -->
					<!-- Start Lastname -->
					<div class="form-group row">
						<label for="lastname" class="col-sm-3 col-form-label">Lastname</label>
						<div class="col-sm-9">
							<input type="text" name="lastname" pattern="^[A-Za-z]{3,}$" id="lastname" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Lastname" value="<?php echo $row['member_lname']; ?>" required>
							<div class="invalid-feedback">Please provide a Lastname</div>
						</div>
					</div><!-- End -->
					<!-- Start Username -->
					<div class="form-group row">
						<label for="username" class="col-sm-3 col-form-label">Username</label>
						<div class="col-sm-9">
							<input type="text" pattern="^[A-Za-z0-9]{3,}$" class="form-control form-control-sm" name="username" id="username" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Username" value="<?php echo $row['member_name']; ?>" required>
							<div class="invalid-feedback">Please provide a Username</div>
						</div>
					</div><!-- End -->
					<!-- Start Mobile Number -->
					<div class="form-group row">
						<label for="mobileno" class="col-sm-3 col-form-label">Mobile Number</label>
						<div class="col-sm-9">
							<input type="tel" name="mobileno" id="mobileno" class="form-control form-control-sm" pattern="^[0-9]{10,}$" aria-describedby="emailHelp" placeholder="Enter Mobile Number" value="<?php echo $row['member_mobile']; ?>" required>
							<div class="invalid-feedback">Please provide a Mobile Number</div>
						</div>
					</div><!-- End -->
					<!-- Start Email -->
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">Email Address</label>
						<div class="col-sm-9">
							<input type="email" name="email" id="email" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php echo $row['member_email']; ?>" required  pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
							<div class="invalid-feedback">Please provide a email Address</div>
						</div>
					</div><!-- End -->
					<!-- Start Address -->
					<div class="form-group row">
						<label for="address" class="col-sm-3 col-form-label">Address</label>
						<div class="col-sm-9">
							<textarea name="address" id="address" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Address" pattern="[A-Za-z0-9]{3,}" required><?php echo $row['member_address']; ?></textarea>
							<div class="invalid-feedback">Please provide a Address</div>
						</div>
					</div><!-- End -->
					<!-- Start User Role -->
					<div class="form-group row">
						<label class="form-check-label col-sm-3" for="exampleRadios1">User Role</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="userrole" id="role_employee" value="e" <?php if($row['member_role']=='e') echo "checked"; ?> required <?php if($_REQUEST['role'] == 'e') echo 'checked'; ?>>
								<label class="form-check-label" for="role_employee">Employee</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="userrole" id="role_client" value="c" <?php if($row['member_role']=='c') echo "checked"; ?> required <?php if($_REQUEST['role'] == 'c') echo 'checked'; ?>>
								<label class="form-check-label" for="role_client">Client</label>
							</div>
							<div class="invalid-feedback">Please Select User Role</div>
						</div>
					</div><!-- End -->
					<!-- Start Password -->
					<div class="form-group row">
						<label for="password" class="col-sm-3 col-form-label">Password</label>
						<div class="col-sm-9">
							<input type="password" name="password" id="password" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Password" required>
							<div class="invalid-feedback">Please provide a Password</div>
						</div>
					</div><!-- End -->
					<!-- Start Confirm Password -->
					<div class="form-group row">
						<label for="repassword" class="col-sm-3 col-form-label">Confirm Password</label>
						<div class="col-sm-9">
							<input type="password" name="repassword" id="repassword" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Enter Confirm Password" required>
							<div class="invalid-feedback">Please provide a Confirm Password</div>
						</div>
					</div><!-- End -->
					<!-- Start Button -->
					<div class="row">
						<div class="col-sm-3">
						</div>
						<div class="col-sm-9">
							<input type="hidden" name="submited" value="1" />
							<button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</button>
						</div>
					</div><!-- End -->
				</form>
			</div><!-- End Col-sm-12 -->
		</div><!-- End Row -->
	</div><!-- End Container -->
	<?php } ?>
	<?php include("./include/footer.php"); ?>

