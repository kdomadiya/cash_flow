<div class="row">
	<div class="col-sm-12 text-center mb-2">
		<h2>Clients Report</h2>
	</div>
</div>

<?php
$date=date('d/m/Y');

if(isset($_REQUEST['submit'])){
	$party_code=$_REQUEST['party_code'];
	$from_date=$_REQUEST['from_date'];
	$to_date=$_REQUEST['to_date'];
	$amount=$_REQUEST['amount'];
	$particular=$_REQUEST['particular'];
	if($particular==" "){
		$particular=NULL;
	}

}
else{
	$party_code=0;
	//$from_date=date('d/m/Y');
	$from_date = date('d/m/Y', strtotime('-30 days'));
	$to_date=date('d/m/Y');
	$amount=NULL;
	$particular=NULL;
}

?>

<div class="row">
	<div class="col-sm-12">
		
		<form name="report" class="form-inline" method="GET" action="" autocomplete="off">
			<label for="party_name" class="col-form-label mr-sm-2">Party</label> 

			<input type="text" class="form-control form-control-sm mr-sm-2" name="party_code" id="party_code" value="<?php echo $party_code; ?>" placeholder="10" style="width:38px;"> 

			<select name="party_name" class="custom-select custom-select-sm mr-sm-2" id="party_name">
				<option value="0">--- Select ---</option>
				<?php
				$result=mysqli_query($con, "select * from members where member_Status='a' and member_role='c' ORDER BY member_fname,member_lname ASC");
				while($row=mysqli_fetch_array($result)){
					echo "<option value='".$row['member_id']."'";

					if($party_code==$row['member_id']){
						echo " selected";
					}

					echo ">". $row['member_fname']. " " . $row['member_lname']." (". $row['member_id'] .")</option>\n";
				}
				?>
			</select>

			<label for="from_date" class="col-form-label mr-sm-2">From Date</label> 
			<input type="text" class="form-control form-control-sm mr-sm-2" name="from_date" value="<?php echo $from_date; ?>" style="width:110px;" />
			<label for="to_date" class="col-form-label mr-sm-2">To Date</label> 
			<input type="text" class="form-control form-control-sm mr-sm-2" name="to_date" value="<?php echo $to_date ?>" style="width:110px;" />
			<label for="to_date" class="col-form-label mr-sm-2">Amount</label> 
			<input type="text" class="form-control form-control-sm mr-sm-2" name="amount" value="<?php echo $amount ?>" style="width:110px;" />
			<label for="Particular" class="col-form-label mr-sm-2">Particular</label> 
			<div style="position: relative;">
				<input type="text" class="form-control form-control-sm mr-sm-2" name="particular" id="particular" value="<?php echo $particular; ?>" onfocus='ShowReportParticular(this.value)' onkeyup='ShowReportParticular(this.value)' /><div id="report_hint"></div>
			</div>
			<input type="hidden" class="form-control form-control-sm mr-sm-2" name="submit" value="s" /> 
			<button type="Submit" class="btn btn-secondary btn-sm" name="search" id="search"><i class="fa fa-search"></i> Search</button>
		</form>
	</div>
</div>

<?php
$credit=0;
$debit=0;
if($amount==NULL){
	$amount_value="";
}
else{
	$amount_value=" and amount=$amount ";
}
if($role=='c'){
	$credit_result_total=mysqli_query($con, "SELECT sum(amount) AS credit FROM records WHERE party_id=$id and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='c' and status!='d'");
	$debit_result_total=mysqli_query($con, "SELECT sum(amount) AS debit FROM records WHERE party_id=$id and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='d' and status!='d'");

	$credit_result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and party_id=$id and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='c' and status!='d' and particular LIKE '$particular%' ORDER BY id desc");
	$debit_result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and party_id=$id and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='d' and status!='d' and particular LIKE '$particular%' ORDER BY id desc");

}
else{

	if($party_code==0){
		$credit_result_total=mysqli_query($con, "SELECT sum(amount) AS credit FROM records WHERE create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='c' and status!='d' and particular LIKE '$particular%'");
		$debit_result_total=mysqli_query($con, "SELECT sum(amount) AS debit FROM records WHERE create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='d' and status!='d' and particular LIKE '$particular%'");

		$credit_result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='c' and status!='d' and particular LIKE '$particular%' ORDER BY create_date desc");
		$debit_result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='d' and status!='d' and particular LIKE '$particular%' ORDER BY create_date desc");

	}
	else{
		$credit_result_total=mysqli_query($con, "SELECT sum(amount) AS credit FROM records WHERE party_id=$party_code and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='c' and status!='d'");
		$debit_result_total=mysqli_query($con, "SELECT sum(amount) AS debit FROM records WHERE party_id=$party_code and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='d' and status!='d'");

		$credit_result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and party_id=$party_code and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='c' and status!='d' and particular LIKE '$particular%' ORDER BY id desc");
		$debit_result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and party_id=$party_code and create_date BETWEEN STR_TO_DATE('$from_date','%d/%m/%Y') and STR_TO_DATE('$to_date','%d/%m/%Y') $amount_value and amount_type='d' and status!='d' and particular LIKE '$particular%' ORDER BY id desc");
	}
}
while($row=mysqli_fetch_array($credit_result_total))
{
	$credit=$row['credit'];
}
while($row=mysqli_fetch_array($debit_result_total))
{
	$debit=$row['debit'];
}
$total=$credit-$debit;
?>

<div class="row">
	<div class="col-sm-4 text-left"> <span class="btn text-success">Cr: <?php if($credit=="")echo"0"; else echo $credit; ?></span></div>
	<div class="col-sm-4 text-center"> <span class="btn text-info">Total: <?php echo $total; ?></span></div>
	<div class="col-sm-4 text-right"> <span class="btn text-danger">Dr: <?php if($debit=="")echo"0"; else echo $debit; ?></span></div>
</div>

<div class="row">
	<div class="col-sm-6">
		<table id="credit" class="table table-striped table-hover table-sm" cellspacing="1px" cellpadding="0px" width="498px" style="overflow:hidden;">
			<tr>
				<th>Date</th>
				<th>Amount</th>
				<th>Party</th>
				<th>Particular</th>
				<?php if($role=='a' || $role=='e'){ ?><th class="text-right"><i class="fa fa-pencil-square-o"></i></th><?php } ?>
			</tr>
			<?php
			while($row=mysqli_fetch_array($credit_result)){
				?>
				<tr>
					<td><?php echo $row['date']; ?></td>
						<td><?php echo number_format($row['amount'],0); ?></td>
						<td><?php echo $row['member_fname']." ".$row['member_lname']." ".$row['party_id'] ; ?></td>
						<td><?php echo $row['particular']; ?></td>
						<?php if($role=='a' || $role=='e'){ ?><td class="text-right">
						<a href="update.php?id=<?php echo $row['id']; ?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a></td>
						<?php } ?>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="col-sm-6">
				<table id="debit" class="table table-striped table-hover table-sm" cellspacing="1px" cellpadding="0px" width="498px" style="overflow:hidden;">
					<tr>
						<th>Date</th>
						<th>Amount</th>
						<th>Party</th>
						<th>Particular</th>
						<?php if($role=='a' || $role=='e'){ ?><th class="text-right"><i class="fa fa-pencil-square-o"></i></th><?php } ?>
					</tr>
					<?php
					while($row=mysqli_fetch_array($debit_result)){
						?>
						<tr>
							<td><?php echo $row['date']; ?></td>
								<td><?php echo number_format($row['amount'],0); ?></td>
								<td><?php echo $row['member_fname']." ".$row['member_lname']." ".$row['party_id'] ; ?></td>
								<td><?php echo $row['particular']; ?></td>
								<?php if($role=='a' || $role=='e'){ ?><td class="text-right">
						<a href="update.php?id=<?php echo $row['id']; ?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a></td>
						<?php } ?>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>

