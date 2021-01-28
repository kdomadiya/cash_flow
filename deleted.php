<?php $current=5; ?>
<?php include("./include/header.php"); ?>

<?php 
if($role!='a' && $role!='e'){
  echo "<div style='width:800px; margin:20px auto; border:0px solid #ff0000;'><b>Sorry...</b> You have no perivilage to visit this page.</div>";
  exit();
}
?>
<div class="container"> 
	<div class="row"> 
		<div class="col-sm-12"> 
<?php include("./library/deleted.php"); ?>
		</div>
	</div>
</div>
<?php include("./include/footer.php"); ?>