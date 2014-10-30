<?php
if (isset($beforejQuery)) {
    echo $beforejQuery;
}
?>
<!-- Footer -->
<footer class="text-center">
	<div class="footer-above">
		<div class="container">
			<div class="row">
				<div class="footer-col col-md-4">
					<h3>Location</h3>
					<p>
						3481 Melrose Place<br>Beverly Hills, CA 90210
					</p>
				</div>
				<div class="footer-col col-md-4">
					<h3>Around the Web</h3>
					<ul class="list-inline">
						<li><a href="#" class="btn-social btn-outline"><i
								class="fa fa-fw fa-facebook"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
								class="fa fa-fw fa-google-plus"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
								class="fa fa-fw fa-twitter"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
								class="fa fa-fw fa-linkedin"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
								class="fa fa-fw fa-dribbble"></i></a></li>
					</ul>
				</div>
				<div class="footer-col col-md-4">
					<h3>About Freelancer</h3>
					<p>
						Freelance is a free to use, open source Bootstrap theme created by
						<a href="http://startbootstrap.com">Start Bootstrap</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">Copyright &copy; Your Website 2014</div>
			</div>
		</div>
	</div>
</footer>

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="assets/DataTables-1.10.3/media/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<!-- Import CSV-->
<script src="functionsjs/import.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/freelancer.js"></script>

<!-- add new address Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="functionsjs/create_addre.js"></script>

<!-- delete js -->
<script src="functionsjs/delete.js" ></script>

<!-- edit js -->
<<script src="functionsjs/edit.js"></script>
 
<?= (isset($afterjQuery))? $afterjQuery : "";?>

</body>
</html>
