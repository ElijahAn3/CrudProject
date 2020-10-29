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
		<title>Crud App</title>
		<!-- CSS -->
		<link href="../assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="../assets/plugins/owl-carousel/owl.theme.default.min.css" rel="stylesheet">
		<link href="../assets/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
		<link href="../assets/css/app.css" rel="stylesheet">
		<!-- Fonts/Icons -->
		<link href="../assets/plugins/font-awesome/css/all.css" rel="stylesheet">
		<link href="../assets/plugins/themify/themify-icons.min.css" rel="stylesheet">
		<style>
		/* TABLE CSS */
			#tablescroll
			{
			overflow-y: scroll;
			height: 310px;
			}
			#tablescroll::-webkit-scrollbar { width: 0 !important }

			.container
			{
			max-width: 1400px;
			}

			#phonetable, #emailtable, #nametable
			{
			min-width: 260px;
			}

			#actiontable 
			{
			min-width: 175px;
			}
			</style>
	
		</head>
		<body>
			<!-- HEADER -->
			<header>

				<!-- NAVBAR -->
				<nav class="navbar navbar-dark"><!-- add 'navbar-dark/navbar-grey/navbar-transparent/navbar-transparent-dark' -->
					<div class="container">
						<a class="navbar-brand" href="index.php">
							<h5>CRUD</h5>
						</a>
					</div>
				</nav>
				<!-- END OF NAVBAR -->

				<!-- section -->
				<div class="section bg-dark-lighter">
					<div class="container text-center">
						<h2 class="font-weight-light">CRUD Application</h2>
					</div>
				</div>
			</header>
			<!-- END OF HEADER -->

			<!-- MAIN SECTION -->
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<hr>

									<!-- PHP ERROR ALERTS -->
									<?php if( isset($_SESSION['response']) ){ ?>
									<div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<b><?= $_SESSION['response']; ?></b>
									</div>
									<?php } unset($_SESSION['response']); ?>
	
	
									<?php if( isset($_SESSION['name_err']) ){ ?>
									<div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible text-center">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<b><?= $_SESSION['name_err']; ?></b>
									</div>
									<?php } unset($_SESSION['name_err']);?>
	
									<?php if( isset($_SESSION['email_err']) ){ ?>
									<div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible text-center">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<b><?= $_SESSION['email_err']; ?></b>
									</div>
									<?php } unset($_SESSION['email_err']);?>
									<!-- END OF PHP ERROR ALERTS -->

								</div>
							</div>

							<!-- INPUT/EDIT FIELD -->
							<div class="row">
								<div class="col-md-3">
									<h3 class="text-center text-dark font-weight-light">Add Record</h3>
									<form action="action.php" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?= $id; ?>">
										<div class="form-group">
											<input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Name" required>
										</div>
										<div class="form-group">
											<input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="E-mail (Fake Email)" required>
										</div>
										<div class="form-group">
											<?php if( $update==true ){ ?>
												<input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
											<?php } else { ?>
											<input type="submit" name="add" class="btn btn-success btn-block" value="Add Record">
											<?php } ?>
										</div>
									</form>
								</div>
								<div class="col-md-9">
									<?php
										// Prepared statement
										$query="SELECT * FROM crud";
										$stmt=$conn->prepare($query);
										$stmt->execute();
										$result=$stmt->get_result();
									?>
							<!-- END OF INPUT/EDIT FIELD -->

									<!-- TABLE DATA -->
									<h3 class="text-center text-dark font-weight-light">Database Records</h3>
									<div id="tablescroll">
										<table class="table table-hover table-striped table-responsive-md">
											<thead class="thead-dark">
												<tr>
													<th id="nametable" class="font-weight-light">Name</th>
													<th id="emailtable" class="font-weight-light">Email</th>
													<th id="actiontable" class="font-weight-light">Action</th>
												</tr>
												</thead>
												<tbody>
													<?php while( $row=$result->fetch_assoc() ){ ?>
													<tr>
														<td><?= $row['name']; ?></td>
														<td><?= $row['email']; ?></td>
														<td>
															<a href="details.php?details=<?= $row['id']; ?>" class="badge text-light bg-dark p-auto">Details</a> 
															<a href="index.php?edit=<?= $row['id']; ?>" class="badge text-success p-auto">Edit</a>
															<a href="action.php?delete=<?= $row['id']; ?>" class="badge text-muted font-italic p-auto" onclick="return confirm('Do you want to delete this record?');">Delete</a>
														</td>
													</tr>
													<?php } ?>
											</tbody>
										</table>
									</div>
									<!-- END OF TABLE DATA -->

								</div>
							</div>
						</div>
					</div><!-- End of row -->
				</div><!-- End of container -->
			</div>
			<!-- END OF MAIN SECTION -->

			<!-- FOOTER -->
			<footer>
				<div class="footer bg-dark">
					<div class="container">
						<div class="row col-spacing-10">
							<div class="container text-right">
								<h6 class="heading-uppercase">Contact Info</h6>
								<ul class="list-unstyled">
									<li>141 Crud St. New York, NY 10012</li>
									<li>contact@example.com</li>
									<li>(281) 330-8004</li>
								</ul>
								<div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<h3>CRUD</h3>
								</div>
							</div>
						</div><!-- end of row(1) -->
	
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
						</div><!-- end of row(2) -->
					</div><!-- end of container -->
				</div>
			</footer>
			<!-- END OF FOOTER -->

		<!-- ***** JAVASCRIPTS ***** -->
		<script src="../assets/plugins/jquery.min.js"></script>
		<script src="../assets/plugins/plugins.js"></script>
		<script src="../assets/js/functions.js"></script>

	</body>
</html>