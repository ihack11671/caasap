<?php

if (isset($_POST['submit'])) {

	$c_name = $_POST['c_name'];
	$c_location = $_POST['c_location'];
	$crn_brn_no = $_POST['crn_brn_no'];
	$c_email = $_POST['c_email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	require_once 'db_conn.inc.php';
	require_once './functions.inc.php';

	if (emptyInputSignup($c_name, $c_location, $crn_brn_no, $c_email, $password, $password2) !== false) {
		header("location: ../index.php?error=emptyinput");
		exit();
	}

	if (corporateExists($conn, $crn_brn_no, $email) !== false) {
		header("location: ../index.php?error=corporateExists");
		exit();
	}

	createCorporate($conn, $c_name, $c_location, $crn_brn_no, $c_email, $password);
} else {
	header("location: ../index.php");
	exit();
}
