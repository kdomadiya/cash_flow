<?php $current=1; ?>
<?php include("./include/header.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 text-center">
			<?php
$result=mysqli_query($con, "select * from settings where name='background'");
while($row=mysqli_fetch_array($result)){
echo "<img src='" .$row['value']. "' style='margin: 0px auto;width:1000px' />";
} 
?>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
$("body").css("background","#223f3f");
$("body").css("overflow","hidden");
});
</script>
<?php include("./include/footer.php"); ?>