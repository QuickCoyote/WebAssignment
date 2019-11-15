<?php
//set connection variables

$host = "pi-jlau";
$username = "jlau";
$password = "banana";
$db_name = "dnd"; //database name
//connect to mysql server
$mysqli = new mysqli($host, $username, $password, $db_name);

//check if any connection error was encountered
if(mysqli_connect_errno()) {
echo "Error: Could not connect to database.";
exit;
}