<?php
$server = "localhost";
$username = "lagivamo_dba";
$password = "Speci@l1";
$database = "lagivamo_db";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

?>
