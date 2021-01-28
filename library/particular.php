<?php

include('../include/config.php');

$search=$_GET['search'];
$credit_hint=mysqli_query($con, "SELECT particular FROM records WHERE particular LIKE '$search%' GROUP BY particular LIMIT 5");


while($row=mysqli_fetch_array($credit_hint)){
?>
<li><?php echo $row['particular']; ?></li>
<?php } ?>
