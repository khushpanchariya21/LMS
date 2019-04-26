<?php
$servername = "localhost";		
$username = "root";
$password = "";
$dbname = "lib2";

$con = new mysqli($servername, $username, $password, $dbname);

if($con->connect_error)
{
	die("Connection Failed".$con->connect_error);
}
//dont close the connection like $con->close(); here it will cause problems when u import this file in other php files
?>