<?php
include_once 'includes/header.php';

if (isset($_SESSION['parentId'])) {
	header("location: /index.php");
	exit();
} elseif (isset($_SESSION['childId'])) {
	header("location: /index.php");
	exit();
}
?>

<section>
	<div class="alert alert-primary" role="alert" id="success-alert">
		User has logged in successfully!
	</div>
	<div class="alert alert-danger" role="alert" id="empty-input-alert">
		Please fill all fields!
	</div>
	<div class="alert alert-danger" role="alert" id="wrong-login-alert">
		Wrong Login Credentials!
	</div>

</section>

<main class="container-fluid">
	<h2>Child Login</h2>
	<form action="includes/child_login.inc.php" method="post" accept-charset="utf-8">
		<div class="form-floating m-2">
			<input type="text" class="form-control" name="crn_brn_no" placeholder="crn_brn_no or Email">
			<label for="crn_brn_no">crn_brn_no or Email</label>
		</div>
		<div class="form-floating m-2">
			<input type="password" class="form-control" name="password" placeholder="Password">
			<label for="password">Password</label>
		</div>
		<button class="btn btn-success" type="submit" name="submit">Log In</button>
	</form>
</main>

<?php
include_once 'includes/footer.php';
?>

<script>
	// Hide all alerts initially
	$("#success-alert").hide();
	$("#empty-input-alert").hide();
	$("#wrong-login-alert").hide();

	// Get the URL of the current page
	const url = window.location.href;

	// Check if the URL contains a specific string
	if (url.includes("error=wronglogin")) {
		// Display the wrong-login-alert if the string is found
		$("#wrong-login-alert").show();
	} else if (url.includes("error=loginsuccess")) {
		// Display the success-alert if the string is found
		$("#success-alert").show();
	} else if (url.includes("error=emptyinput")) {
		// Display the empty-input-alert if the string is found
		$("#empty-input-alert").show();
	}
</script>