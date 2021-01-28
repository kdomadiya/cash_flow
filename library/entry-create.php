<?php

if($_REQUEST['submit']=='c'){
$date=$_REQUEST['credit_date'];
$amount=$_REQUEST['credit_amount'];
$type=$_REQUEST['submit'];
$code=$_REQUEST['credit_party_code'];
$name=$_REQUEST['credit_party_name'];
$part=$_REQUEST['credit_particular'];
}
else if($_REQUEST['submit']=='d'){
$date=$_REQUEST['debit_date'];
$amount=$_REQUEST['debit_amount'];
$type=$_REQUEST['submit'];
$code=$_REQUEST['debit_party_code'];
$name=$_REQUEST['debit_party_name'];
$part=$_REQUEST['debit_particular'];
}

include("../include/config.php");
mysqli_query($con, "INSERT INTO records (create_date,amount,amount_type,party_id,particular) values(STR_TO_DATE('$date','%d/%m/%Y'),'$amount','$type','$code','$part')") or die(mysqli_error($con));
header("Location:../entry.php");
echo "<meta http-equiv='refresh' content='0,entry.php' />";
//$result=mysqli_query($con, "select *,DATE_FORMAT(create_date,'%d/%m/%Y') AS date from records,users where records.party_id=users.user_id and create_date=STR_TO_DATE('$date','%d/%m/%Y') and amount_type='c' ORDER BY id desc limit 15");

?>