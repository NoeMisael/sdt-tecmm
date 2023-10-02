<?php
session_start();
$DATABASE_HOST = 'sql203.infinityfree.com';
$DATABASE_USER = 'if0_34974915';
$DATABASE_PASS = '88axB9RNXHrqn';
$DATABASE_NAME = 'if0_34974915_Tecmm';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}else{
	print("Hola mundo");
}