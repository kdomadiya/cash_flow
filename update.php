<?php $current=3; ?>
<?php include("./include/header.php"); ?>
<?php
$record_id=$_REQUEST['id'];
$result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members where records.party_id=members.member_id and id=$record_id")or die("Sorry...");


$result_name=mysqli_query($con, "select * from members where member_Status='a' and member_role='c' ORDER BY member_fname,member_lname ASC")or die("Sorry...");



while($row=mysqli_fetch_array($result)){
	?>

	<div class="container">

		<div class="row">
			<div class="col-sm-4 offset-sm-4">


	<form name="update" id="update" action="report_update.php" metho="POST">

		<table class="table">
			<caption>Update Id : <?php echo $record_id; ?>
				<input type="hidden" name="update_id" class="form-control form-control-sm" id="update_id" value="<?php echo $record_id; ?>" />
			</caption>
			<tr>
				<td>Date :</td>
				<td><input type="text" name="update_date" class="form-control form-control-sm" id="update_date" value="<?php echo $row['date']; ?>" style="width:80px;" /></td>
			</tr>
			<tr>
				<td>Amount :</td>
				<td><input type="text" name="update_amount" class="form-control form-control-sm" id="update_amount" value="<?php echo $row['amount']; ?>" placeholder="10,00,00,000" style="width:100px;" /></td>
			</tr>
			<tr>
				<td>Party :</td>
				<td><input type="text" name="update_party_code" class="form-control form-control-sm" id="update_party_code" value="<?php echo $row['party_id']; ?>" placeholder="10" style="width:38px;"  />

					<input type="text" name="update_party_name" class="form-control form-control-sm" id="update_party_name" value="<?php echo $row['member_fname']. " " . $row['member_lname']." (". $row['member_id'] . ")"; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>Particular :</td>
				<td><input type="text" name="update_particular" class="form-control form-control-sm" id="update_particular" value="<?php echo $row['particular']; ?>" placeholder="Debited from vipul Dobariya" style="width:257px;" onfocus="ShowUpdateParticular(this.value)" onkeyup="ShowUpdateParticular(this.value)" /> <div id="update_hint"></div></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" class="btn btn-sm" name="submit" value="u" />
					<input type="submit" class="btn btn-secondary btn-sm" name="update" value="Update" /> 
					
					<input type="submit" form="delete" class="btn btn-danger btn-sm ml-2" name="delete" value="Delete" />
					<big class="ml-2 btn btn-dark btn-sm" style="cursor:pointer;" onclick="window.history.back()">&lt;&lt; Go Back</big>
				</td>
			</tr>
		</table>

	</form>


<form name="delete" id="delete" class="mt-2" action="report_delete.php" metho="POST">
			<input type="hidden" name="delete_id" id="delete_id" value="<?php echo $record_id; ?>" />
			<td><input type="hidden" name="submit" value="d" />
			</form>

</div>
		</div>

	</div>

	<?php  }  ?>

	<div style="margin-left:263px;z-index:999999;position:absolute;">
		
			<div style="margin-top:200px;"></div>
		</div>

		<?php include("./include/footer.php"); ?>

