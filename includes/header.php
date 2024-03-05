<?php
session_start();

require_once './includes/alert.inc.php';

?>
<!doctype html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>CAASAP</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/logo.jpeg" rel="icon">
	<link href="assets/img/logo.jpeg" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Arsha
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="index.html">CAASAP</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="#about">About</a></li>
					<li><a class="nav-link scrollto" href="#services">Services</a></li>
				    <li><a class="nav-link scrollto" href="#team">DEVELOPER</a></li>
			    	<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
					<?php
					if (!isset($_SESSION['corporateId'])) {
					?>
						<li>
							<button type="button" class="getstarted scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">
								Login
							</button>
						</li>
						<li>
							<button type="button" class="getstarted scrollto" data-bs-toggle="modal" data-bs-target="#signupModal">
								Get Started
							</button>
						</li>
					<?php
					} else {
					?>
						<li>
							<button type="button" class="getstarted scrollto" data-bs-toggle="modal" data-bs-target="#logoutModal">
								Logout
							</button>
						</li>
					<?php
					}
					?>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->

	<!-- Signup Modal -->
	<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<h2>Coorporate Signup</h2>
					<form class="needs-validation" action="includes/signup.inc.php" method="post" accept-charset="utf-8">
						<div class="row row-cols-lg-2 row-cols-sm-1 row-cols-md-2 g-2 my-2">
							<div class="col">
								<div class="form-floating">
									<input type="text" class="form-control" name="c_name" placeholder="Corporate Name">
									<label for="c_name">Corporate Name</label>
								</div>
							</div>
							<div class="col">
								<div class="form-floating">
									<input type="text" class="form-control" name="c_location" placeholder="Corporate location">
									<label for="c_location">Corporate location</label>
								</div>
							</div>

							<div class="col">
								<div class="form-floating">
									<input type="text" class="form-control" name="crn_brn_no" placeholder="CRN-BRN Number">
									<label for="crn_brn_no">CRN/BRN Number</label>
								</div>
							</div>
							<div class="col">
								<div class="form-floating">
									<input type="email" class="form-control" name="c_email" placeholder="corporate@business.com">
									<label for="c_email">Email address</label>
								</div>
							</div>
							<div class="col">
								<div class="form-floating input-group">
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkPasswordMatch()">
									<label for="password">Password</label>
									<button class="btn btn-sm btn-dark" type="button" id="show-password-button" onclick="togglePasswordVisibility('password', this)">
										<img src="/img/open_eye.svg" alt="">
									</button>
								</div>
							</div>
							<div class="col">
								<div class="form-floating input-group">
									<input type="password" class="form-control" name="password2" id="confirm-password" placeholder="Confirm Password" onkeyup="checkPasswordMatch()">
									<label for="password2">Confirm Password</label>
									<button class="btn btn-sm btn-dark" type="button" id="show-confirm-password-button" onclick="togglePasswordVisibility('confirm-password', this)">
										<img src="/img/open_eye.svg" alt="">
									</button>
								</div>
							</div>
						</div>
						<button class="btn btn-success" type="submit" name="submit" id="submit-button">Sign Up</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<h2>Coorporate Login</h2>
					<form action="includes/login.inc.php" method="post" accept-charset="utf-8">
						<div class="row row-cols-lg-2 row-cols-sm-1 row-cols-md-2 g-2 my-2">
							<div class="col">
								<div class="form-floating">
									<input type="text" class="form-control" name="crn_brn_no" placeholder="crn_brn_no or Email">
									<label for="crn_brn_no">CRN/BRN Number or Email</label>
								</div>
							</div>
							<div class="col">
								<div class="form-floating input-group">
									<input type="password" class="form-control" name="password" id="password" placeholder="Password">
									<label for="password">Password</label>
								</div>
							</div>
						</div>
						<button class="btn btn-success" type="submit" name="submit">Log In</button>
					</form>

				</div>
			</div>
		</div>
	</div>

	<!-- Logout Modal -->
	<div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-danger" id="logoutModalLabel">Warning</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you sure you want to logout?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<a href="includes/logout.inc.php" class="btn btn-danger" onclick="logout()">Logout</a>
				</div>
			</div>
		</div>
	</div>