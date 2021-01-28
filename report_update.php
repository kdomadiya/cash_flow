<?php

session_start();

include("include/config.php");

if(!empty($_REQUEST['submit'])){

$record_id=$_REQUEST['update_id'];
$date=$_REQUEST['update_date'];
$amount=$_REQUEST['update_amount'];
$party_id=$_REQUEST['update_party_code'];
$particular=$_REQUEST['update_particular'];

mysqli_query($con, "update records set create_date=STR_TO_DATE('$date','%d/%m/%Y'),amount='$amount',party_id='$party_id',particular='$particular',status='e' where id='$record_id'")or die(mysqli_error($con));
echo "Record Successfully Updated In Database.";
header ("Location: report.php");
echo "<meta http-equiv='refresh' content='0,report.php' />";
}
?>