<?php include("head.php"); ?>
<body>
	<div class="page">
		<?php
		 $name=$_SESSION['member_name'];
		//$name = 'jkdobariya';
		$result=mysqli_query($con, "select * from members where member_name='$name'");
		while($row=mysqli_fetch_array($result)){
			$role=$row['member_role'];
			$id=$row['member_id'];
			$name=$row['member_name'];
		}
		?>
		<header style="background-color: #f2f2f2">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<nav class="navbar navbar-expand-lg navbar-light">
							<a class="navbar-brand" href="index.php">Abril Int.</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<?php if($role=='a'){ ?>
								<ul class="navbar-nav mr-auto">
									<li class="nav-item <?php if($current==1){echo "active";} ?>">
										<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item <?php if($current==2){echo "active";} ?>">
										<a class="nav-link" href="entry.php">Entry</a>
									</li>
									<li class="nav-item <?php if($current==3){echo "active";} ?>">
										<a class="nav-link" href="report.php">Report</a>
									</li>
									<li class="nav-item <?php if($current==4){echo "active";} ?>">
										<a class="nav-link" href="edited.php">Edited</a>
									</li>
									<li class="nav-item <?php if($current==5){echo "active";} ?>">
										<a class="nav-link" href="deleted.php">Deleted</a>
									</li>
									<li class="nav-item <?php if($current==6){echo "active";} ?>">
										<a class="nav-link" href="users.php">Users</a>
									</li>
									<li class="nav-item <?php if($current==7){echo "active";} ?>">
										<a class="nav-link" href="manage.php">Manage</a>
									</li>
								</ul>
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link">
											DATE : <?php echo date("d-M-Y"); ?> &nbsp; TIME : <?php echo date("h:i:s"); ?>
										</a>
									</li>
									<li class="nav-item <?php if($current==8){echo "active";} ?>">
										<a class="nav-link" href="users-profile.php">Profile</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="logout.php">Logout</a>
									</li>
								</ul>
								<?php } else if ($role=='e') { ?>
								<ul class="navbar-nav mr-auto">
									<li class="nav-item <?php if($current==1){echo "active";} ?>">
										<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item <?php if($current==2){echo "active";} ?>">
										<a class="nav-link" href="entry.php">Entry</a>
									</li>
									<li class="nav-item <?php if($current==3){echo "active";} ?>">
										<a class="nav-link" href="report.php">Report</a>
									</li>
									<li class="nav-item <?php if($current==4){echo "active";} ?>">
										<a class="nav-link" href="edited.php">Edited</a>
									</li>
									<li class="nav-item <?php if($current==5){echo "active";} ?>">
										<a class="nav-link" href="deleted.php">Deleted</a>
									</li>
									<li class="nav-item <?php if($current==6){echo "active";} ?>">
										<a class="nav-link" href="users.php">Users</a>
									</li>
									<li class="nav-item <?php if($current==7){echo "active";} ?>">
										<a class="nav-link" href="manage.php">Manage</a>
									</li>
								</ul>
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link">
											DATE : <?php echo date("d-M-Y"); ?> &nbsp; TIME : <?php echo date("h:i:s"); ?>
										</a>
									</li>
									<li class="nav-item <?php if($current==8){echo "active";} ?>">
										<a class="nav-link" href="users-profile.php">Profile</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="logout.php">Logout</a>
									</li>
								</ul>
								<?php } else if ($role=='c') { ?>
								<ul class="navbar-nav mr-auto">
									<li class="nav-item <?php if($current==1){echo "active";} ?>">
										<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item <?php if($current==3){echo "active";} ?>">
										<a class="nav-link" href="report.php">Report</a>
									</li>
								</ul>
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link">
											DATE : <?php echo date("d-M-Y"); ?> &nbsp; TIME : <?php echo date("h:i:s"); ?>
										</a>
									</li>
									<li class="nav-item <?php if($current==8){echo "active";} ?>">
										<a class="nav-link" href="users-profile.php">Profile</a>
									</li>
									<li class="nav-item <?php if($current==9){echo "active";} ?>">
										<a class="nav-link" href="logout.php">Logout</a>
									</li>
								</ul>
								<?php } else { echo "<b>Sorry : </b>You have no Permission, Ask to Administrator. "; } ?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<div id="content">
<br />
