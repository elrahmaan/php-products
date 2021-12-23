<?php
//for MySQLi OOP
// $conn = new mysqli('10.0.0.74', 'admin', 'Uchiaatew17*', 'storedb');
// if ($conn->connect_error) {
// 	die("Connection failed: " . $conn->connect_error);
// }
////////////////

// for MySQLi Procedural
$conn = mysqli_connect('10.0.0.74', 'admin', 'Uchiaatew17*', 'storedb');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
	//////////////
