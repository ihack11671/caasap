<?php
// Update the details below with your MySQL details
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'project';
$DATABASE_PASS = '11671Bahati';
$DATABASE_NAME = 'phpcomments';
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error
    exit('Failed to connect to database!');
}

