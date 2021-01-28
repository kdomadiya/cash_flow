<?php

include("include/config.php");

if(!empty($_REQUEST['delete'])){

echo $record_id=$_REQUEST['delete_id'];

mysqli_query($con, "update records set status='d' where id='$record_id'")or die(mysqli_error());
header ("Location: report.php");
echo "<meta http-equiv='refresh' content='0,report.php' />";
echo "Record Successfully Deleted From Database.";
}
?>