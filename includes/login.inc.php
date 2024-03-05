<?php

if (isset($_POST['submit'])) {

	$crn_brn_no = $_POST['crn_brn_no'];
	$password = $_POST['password'];

	require_once 'db_conn.inc.php';
	require_once './functions.inc.php';


	if (emptyInputLogin($crn_brn_no, $password) !== false) {
		header("location: ../index.php?error=emptyinput");
		exit();
	}

	loginCorporate($conn, $crn_brn_no, $password);
} else {
	header("location: ../index.php");
	exit();
}
