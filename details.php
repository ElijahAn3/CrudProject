<?php
include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
        <meta name="keywords" content="">
		<title>CRUD APP</title>
		<!-- CSS -->
		<link href="../assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="../assets/plugins/owl-carousel/owl.theme.default.min.css" rel="stylesheet">
		<link href="../assets/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
		<link href="../assets/css/app.css" rel="stylesheet">
		<!-- Fonts/Icons -->
		<link href="../assets/plugins/font-awesome/css/all.css" rel="stylesheet">
		<link href="../assets/plugins/themify/themify-icons.min.css" rel="stylesheet">
	</head>
	<body>
		<!-- HEADER -->
		<header>

			<!-- END OF NAVBAR -->
			<nav class="navbar navbar-dark">
				<div class="container">
					<a class="navbar-brand" href="index.php">
						<h5>CRUD</h5>
					</a>
				</div>
			</nav>
			<!-- END OF NAVBAR -->

			<!-- Center section -->
			<div class="section bg-dark-lighter">
				<div class="container text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mt-3 bg-muted p-4 rounded">
                                <h4 class="text-light font-weight-light">Name : <?= $fname; ?></h4>
                                <h4 class="text-light font-weight-light">Email : <?= $femail; ?></h4>
                            </div> 
                        </div>   
                    </div>
				</div>
			</div><!-- End of section -->

		</header>
		<!-- END OF HEADER -->

		<!-- FOOTER -->
		<footer>
			<div class="footer bg-dark">
				<div class="container">
					<div class="row col-spacing-40">
						<div class="col-12 col-md-6 col-lg-3">
							<h3>CRUD</h3>
						</div>
                        <div class="container text-right">
                                <h6 class="heading-uppercase">Contact Info</h6>
                                <ul class="list-unstyled">
                                    <li>141 Crud St. New York, NY 10012</li>
                                    <li>contact@example.com</li>
                                    <li>(281) 330-8004</li>
                                </ul>
                        </div>    
					</div><!-- End of row(1) -->

					<hr class="margin-top-50 margin-bottom-30">

					<div class="row">
						<div class="col-12 col-md-6 text-center text-md-left">
							<p>&copy; 2020 CRUD App, All Rights Reserved.</p>
						</div>
						<div class="col-12 col-md-6 text-center text-md-right">
							<ul class="list-horizontal-unstyled">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div><!-- End of row(2) -->
				</div><!-- end of container -->
			</div>
		</footer>
		<!-- END OF FOOTER -->

		<!-- ***** JAVASCRIPTS ***** -->
		<script src="../assets/plugins/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
		<script src="../assets/plugins/plugins.js"></script>
		<script src="../assets/js/functions.js"></script>

	</body>
</html>