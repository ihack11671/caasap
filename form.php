<?php
require('db_conn.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['msg'];

    //database details. Yodru have created these details in the third step. Use your own.
    $host = "localhost";
    $crn_brn_no = "project";
    $password = "11671Bahati";
    $dbname = "phpcomments";

    //create connection
    $con = mysqli_connect($host, $crn_brn_no, $password, $dbname);
    //check connection if it is working or not
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }
    //This below line is a code to Send form entries to database
    $sql = "INSERT INTO contactform_entries (id, name, email_fld, msg_fld) VALUES ('0', '$name', '$email', '$message')";
    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        
        echo "created succesfully";
    }
    //connection closed.
    mysqli_close($con);
}
