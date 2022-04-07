<?php
	$dbHost = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
    $dbName = "sonshop";

	$conn = mysqli_connect($dbHost,$dbUsername,$dbPassword, $dbName);
	if($conn) {
        $setLang=mysqli_query($conn, "SET NAMES 'utf8'");
    } else {
        die("Kết nối thất bại ".mysqli_connect_error());
    }
?>