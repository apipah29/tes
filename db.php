<?php
    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'galerii';
	
	$db= mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');
?>