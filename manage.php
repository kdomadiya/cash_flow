<?php $current=7; ?>
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
			<fieldset>
				<legend><h3>Database Backup</h3></legend>
				<a href="export.php">Export Database</a>
				<?php
				if(!isset($_REQUEST['backup'])){
					$backup=NULL;
				}
				else{
					$backup=$_REQUEST['backup'];
				}
				if($backup=='y'){
					$backup_msg="Done";
				}
				else if($backup=='n'){
					$backup_msg="unDone";
				}
				else{
					$backup_msg="";
				}
				echo $backup_msg;
				?>
			</fieldset>
			<fieldset>
				<legend><h3>Change Background</h3></legend>
				<form action="upload.php" class="form" method="post" enctype="multipart/form-data">
					Select image:
					<div class="row">
						<div class="col-sm-3">
							<div class="custom-file">
					<input type="file" name="fileToUpload" class="custom-file-input custom-file-input-sm mb-2" id="fileToUpload" style="border:1px solid #888;">
					<label class="custom-file-label custom-file-lable-sm" for="validatedCustomFile">Choose file...</label>
					</div>
						</div>
					</div>
<div class="row">
	<div class="col-sm-3">
		<input type="submit" value="Upload Image" class="mt-2 btn btn-primary btn-sm" name="submit" style="width:120px">
	</div>
</div>
					
				</form>
			</fieldset>
		</div>
	</div>
</div>

<?php include("./include/footer.php"); ?>