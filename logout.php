<?php
session_start();
if(isset($_SESSION['member_name']) && isset($_SESSION['member_pass'])){
unset($_SESSION['member_name']);
unset($_SESSION['member_pass']); //session_destroy();
header ("Location:login.php");
echo "Please Wait...";
}
else{
header ("Location:login.php");
echo "<meta http-equiv='refresh' content='0,login.php' />";
echo "Please Wait...";
}
 ?> 