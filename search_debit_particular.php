<?php include("include/config.php"); 


$get=$_GET['q'];


$debit_hint=mysqli_query($con, "SELECT * FROM records WHERE particular LIKE '$get%' GROUP BY particular order by particular");
echo "<ul>";
while($row=mysqli_fetch_array($debit_hint)){

echo "<li onclick='debit_insert(this.innerHTML)'>" . $row['particular'] . "</li>";

} 

echo "</ul>";

mysqli_close($con);

?>