<?php
header("Access-Control-Allow-Origin: *"); // Change to the correct domain
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With"); // Remove duplicate header
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";
$_POST = json_decode(file_get_contents("php://input"), true);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo json_encode(array('message' => 'Database connection error.'));
    exit();
} 
// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   

    // Check if username and password match the ones stored in the database
    $sql = "SELECT * FROM users where `password` =  '$password' and `user_name` = '$username' ";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);

    if ($result) {
        // Login successful
        
        echo json_encode(array('status'=>200, 'message' => 'Login successful!'));
    } else {
        // Login failed
        echo json_encode(array('message' => 'Username or password is incorrect!'));
    }
}

mysqli_close($conn);
