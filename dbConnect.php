<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: POST");
// header("Content-Type: application/json;charset=UTF-8");
// header("Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Haders,Authorization,X-Requested-with");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

 