<?php
include_once 'includes/header.php';
?>

<main class="container-fluid">
	<h2>Parent Signup</h2>
	<form class="needs-validation" action="includes/signup.inc.php" method="post" accept-charset="utf-8">
		<div class="row row-cols-lg-2 row-cols-sm-1 row-cols-md-2 g-2 my-2">
			<div class="col">
				<div class="form-floating">
					<input type="text" class="form-control" name="c_name" placeholder="First Name">
					<label for="c_name">First Name</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="text" class="form-control" name="c_location" placeholder="Last Name">
					<label for="c_location">Last Name</label>
				</div>
			</div>

			<div class="col">
				<div class="form-floating">
					<input type="text" class="form-control" name="crn_brn_no" placeholder="crn_brn_no">
					<label for="crn_brn_no">crn_brn_no</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="email" class="form-control" name="email" placeholder="user@example.com">
					<label for="email">Email address</label>
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
</main>
<?php
include_once 'includes/footer.php';
?>
<
<script>
	// Hide all alerts initially
	$("#success-alert").hide();
	$("#empty-input-alert").hide();
	$("#stmt-failed-alert").hide();
	$("#parent-exists-alert").hide();
	// Get the URL of the current page
	const url = window.location.href;
	// Check if the URL contains a specific string
	if (url.includes("error=stmtfailed")) {
		// Display the stmt-failed-alert if the string is found
		$("#stmt-failed-alert").show();
	} else if (url.includes("error=corporateExists")) {
		// Display the success-alert if the string is found
		$("#parent-exists-alert").show();
	} else if (url.includes("error=none")) {
		// Display the success-alert if the string is found
		$("#success-alert").show();
	} else if (url.includes("error=emptyinput")) {
		// Display the empty-input-alert if the string is found
		$("#empty-input-alert").show();
	}
</script>