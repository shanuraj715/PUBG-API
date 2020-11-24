<?php

$server = 'localhost';
$username = 'root';
$password = 'vips';
$db_name = 'pubg';

$conn = mysqli_connect($server, $username, $password, $db_name);

if(!$conn){
	exit();
}

?>