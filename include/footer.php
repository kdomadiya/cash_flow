</div> <!-- id="content" -->
<footer>
	<br>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
				<p class="text-center">Copyrights &copy; <?php echo date('Y') ?> Khadela, All Rights Reserved. <span class="text-right float-right">by <a href="http://www.shreedama.com/">Shreedama Technologies</a></span></p>	
			</div>
		</div>
	</div>
</footer>
</div><!-- page -->
<!-- <script src="./assets/js/jquery.js"></script> -->
  <script src="./assets/js/jquery-1.12.4.js"></script>
<script src="./assets/js/jquery-ui.min.js"></script>
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/validation.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".date").datepicker();
	});
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>