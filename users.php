<?php $current=6; ?>
<?php include("./include/header.php"); ?>

<?php 
if($role!='a' && $role!='e'){
	echo "<div style='width:800px; margin:20px auto; border:0px solid #ff0000;'><b>Sorry...</b> You have no perivilage to visit this page.</div>";
	exit();
}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Clients</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Employee</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  	
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<table class="table table-striped table-hover table-sm" id="employee" border="0px" width="1000px" cellspacing="1px" cellpadding="0px">
				<h2 class="text-center mb-2 mt-2">Employee List <a href="users-add.php?role=e" class="btn btn-secondary float-right"> <i class="fa fa-plus"></i> Add Employee</a></h2>
				<thead>
					<tr>
						<th>ID</th>
						<th>First / Last Name</th>
						<th>User Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
//$sql=$mysqli->select_db($db,$con)or die("Could not Connect to Database");
					$result=mysqli_query($con, "select * from members where member_role='e' and member_status='a'");
					while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<th><?php echo $row['member_id']; ?></th>
							<td><?php echo $row['member_fname'] . " " . $row['member_lname']; ?></td>
							<td><?php echo $row['member_name']; ?></td>
							<td><?php echo $row['member_mobile']; ?></td>
							<td><?php echo $row['member_email']; ?></td>
							<td><a href="users-edit.php?id=<?php echo $row['member_id']; ?>" class="text-secondary"><i class="fa fa-edit"></i> Edit</a></td>
						</tr>

						<?php
					}
					?>
				</tbody>
			</table>
  </div>
  
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<table class="table table-striped table-hover table-sm" id="clients" border="0px" width="1000px" cellspacing="1px" cellpadding="0px">
				<h2 class="text-center mb-2 mt-2">Clients List <a href="users-add.php?role=c" class="btn btn-secondary float-right"> <i class="fa fa-plus"></i> Add Client</a></h2>
				<tr>
					<th>ID</th>
					<th>First / Last Name</th>
					<th>User Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Edit</th>
				</tr>
				<?php
//$sql=mysqli_select_db($db,$con)or die("Could not Connect to Database");
				$result=mysqli_query($con, "select * from members where member_role='c' and member_status='a'");
				while($row=mysqli_fetch_array($result)){
					?>
					<tr>
						<th><?php echo $row['member_id']; ?></th>
						<td><?php echo $row['member_fname'] . " " . $row['member_lname']; ?></td>
						<td><?php echo $row['member_name']; ?></td>
						<td><?php echo $row['member_mobile']; ?></td>
						<td><?php echo $row['member_email']; ?></td>
						<td><a href="users-edit.php?id=<?php echo $row['member_id']; ?>" class="text-secondary"><i class="fa fa-edit"></i> Edit</a></td>
					</tr>
					<?php
				}
				?>
			</table>
  </div>
</div>

			


			

		</div>
	</div>
</div>


<?php include("./include/footer.php"); ?>