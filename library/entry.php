<div class="container"> 
	<div class="row"> 
		<div class="col-sm-6"> 
			<h2 class="text-center">Credit Entry</h1>
		</div>
		<div class="col-sm-6"> 
			<h2 class="text-center">Debit Entry</h1>
		</div>
	</div>


	<div class="row"> 

		<div class="col-sm-6"> 

			<form name="credit" method="POST" action="./library/entry-create.php" onsubmit="return validation_credit();" class="needs-validation form-inline" novalidate autocomplete="off">
				<div class="form-group mb-2 mr-2">
				<input type="text" name="credit_date" class="form-control form-control-sm" id="credit_date" value="<?php echo date("d/m/Y"); ?>" placeholder="18/10/1991" style="width:80px;" />
				</div>
				<div class="form-group mb-2 mr-2">
				<input type="text" name="credit_amount" class="form-control form-control-sm" id="credit_amount" value="" placeholder="10,00,00,000" style="width:100px;" />
			</div>

				<div class="form-group mb-2 mr-2">
				<input type="text" name="credit_party_code" class="form-control form-control-sm" id="credit_party_code" value="" placeholder="10" style="width:45px;"  />
			</div>
			<div class="form-group mb-2">
				<select name="credit_party_name" class="custom-select custom-select-sm" id="credit_party_name" style="width: 215px">
					<option value="0">--- Select ---</option>
					<?php
					$result=mysqli_query($con, "select * from members where member_Status='a' and member_role='c' ORDER BY member_fname,member_lname ASC");
					while($row=mysqli_fetch_array($result)){
						echo "<option value='".$row['member_id']."'>". $row['member_fname']. " " . $row['member_lname']." (". $row['member_id'] .")</option>\n";
					}
					?>
				</select>
			</div>
			<div class="form-group mb-2 mr-auto" style="position: relative;">
				<input type="text" name="credit_particular" class="form-control form-control-sm" class="form-control form-control-sm" id="credit_particular" value="" placeholder="Closing Balance Of Khadela" style="width:400px;" onfocus='ShowCreditParticular(this.value)' onkeyup='ShowCreditParticular(this.value)' autocomplete="off" />
				<div id="credit_hint"></div>
			</div>
				
				<input type="hidden" name="submit" value="c" />
				
			<div class="form-group mb-2">
				<input type="Submit" name="create-credit" class="btn btn-sm btn-danger" id="create-credit" value="Credit" />

				
			</div>
			
			</form>

		</div>

		<div class="col-sm-6"> 
			<form name="debit" method="POST" action="./library/entry-create.php" onsubmit="return validation_debit();" class="needs-validation form-inline" novalidate autocomplete="off">
				<div class="form-group mb-2 mr-2">
				<input type="text" name="debit_date" class="form-control form-control-sm" id="debit_date" value="<?php echo date("d/m/Y"); ?>" placeholder="18/10/1991" style="width:80px;" />
				</div>
				<div class="form-group mb-2 mr-2">
				<input type="text" name="debit_amount" class="form-control form-control-sm" id="debit_amount" value="" placeholder="10,00,00,000" style="width:100px;" />
			</div>

				<div class="form-group mb-2 mr-2">
				<input type="text" name="debit_party_code" class="form-control form-control-sm" id="debit_party_code" value="" placeholder="10" style="width:45px;"  />
			</div>
			<div class="form-group mb-2">
				<select name="debit_party_name" class="custom-select custom-select-sm" id="debit_party_name" style="width: 215px">
					<option value="0">--- Select ---</option>
					<?php
					$result=mysqli_query($con, "select * from members where member_Status='a' and member_role='c' ORDER BY member_fname,member_lname ASC");
					while($row=mysqli_fetch_array($result)){
						echo "<option value='".$row['member_id']."'>". $row['member_fname']. " " . $row['member_lname']." (". $row['member_id'] .")</option>\n";
					}
					?>
				</select>
			</div>
			<div class="form-group mb-2 mr-auto" style="position: relative;">
				<!-- <input type="text" name="debit_particular" class="form-control form-control-sm" class="form-control form-control-sm" id="debit_particular" value="" placeholder="Closing Balance Of Khadela" style="width:400px;" onfocus='ShowcreditParticular(this.value)' onkeyup='ShowcreditParticular(this.value)' autocomplete="off" /> -->

<input type="text" name="debit_particular" class="form-control form-control-sm" id="debit_particular" value="" placeholder="Closing Balance Of Khadela" style="width:400px;" onfocus="ShowDebitParticular(this.value)" onkeyup="ShowDebitParticular(this.value)" autocomplete="off">

				<div id="debit_hint"></div>
			</div>
				
				<input type="hidden" name="submit" value="d" />
				
			<div class="form-group mb-2">
				<button type="Submit" name="create-debit" class="btn btn-sm btn-success" id="create-debit">Debit</button>
				
			</div>
			
			</form>
		</div>

	</div>


	<div class="row"> 

		<div class="col-sm-6">

<div class="table-responsive-lg">
			<table class="table table-sm table-striped table-hover" id="credit" cellspacing="1px" cellpadding="0px" width="710px">
				<tr>
					<th width="77px">Date</th>
					<th width="83px">Amount</th>
					<th width="200px">Party</th>
					<th width="350px">Particular</th>
				</tr>
				<?php
				$date=date('d/m/Y');
				$result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and create_date=STR_TO_DATE('$date','%d/%m/%Y') and amount_type='c' and status!='d' ORDER BY id desc limit 13");
				while($row=mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo number_format($row['amount'],0); ?></td>
						<td><?php echo $row['member_fname']." ".$row['member_lname']." ".$row['party_id'] ; ?></td>
						<td><?php echo $row['particular']; ?></td>
					</tr>
					<?php } ?>
				</table>
</div>

			</div>

			<div class="col-sm-6"> 
<div class="table-responsive-lg">
				<table class="table table-sm table-striped table-hover" id="debit" cellspacing="1px" cellpadding="0px" width="710px">
					<tr>
						<th width="77px">Date</th>
						<th width="83px">Amount</th>
						<th width="200px">Party</th>
						<th width="350px">Particular</th>
					</tr>
					<?php
					$date=date('d/m/Y');
					$result=mysqli_query($con, "SELECT *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date FROM records,members WHERE records.party_id=members.member_id and create_date=STR_TO_DATE('$date','%d/%m/%Y') and amount_type='d' and status!='d' ORDER BY id desc limit 13");
					while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $row['date']; ?></td>
							<td><?php echo number_format($row['amount'],0); ?></td>
							<td><?php echo $row['member_fname']." ".$row['member_lname']." ".$row['party_id'] ; ?></td>
							<td><?php echo $row['particular']; ?></td>
						</tr>
						<?php } ?>
					</table>
</div>
				</div>

			</div>
			<?php
			$date=date('d/m/Y');
			$credit=0;
			$debit=0;
			$result=mysqli_query($con, "SELECT sum(amount) AS credit FROM records WHERE create_date=STR_TO_DATE('$date','%d/%m/%Y') and amount_type='c' and status='a' ORDER BY id desc");
			while($row=mysqli_fetch_array($result))
			{
				$credit=$row['credit'];
			}
			$result=mysqli_query($con, "SELECT sum(amount) AS debit FROM records WHERE create_date=STR_TO_DATE('$date','%d/%m/%Y') and amount_type='d' and status='a' ORDER BY id desc");
			while($row=mysqli_fetch_array($result))
			{
				$debit=$row['debit'];
			}
			$total=$credit-$debit;
			?>

			<div class="row"> 
				<div class="col-sm-4 text-left"> 
					<span id="total-credit" class="text-success">Cr: <?php if($credit=="")echo"0"; else echo $credit; ?></span>
				</div>
				<div class="col-sm-4 text-center"> 
					<span id="total-pl" class="text-info">Total: <?php echo $total; ?></span>
				</div>
				<div class="col-sm-4 text-right"> 
					<span id="total-debit" class="text-danger">Dr: <?php if($debit=="")echo"0"; else echo $debit; ?></span>
				</div>
			</div>
		</div>