<?php

$db_user = "project";
$db_host = "localhost";
$db_pass = "11671Bahati";
$db_name = "phpcomments";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
