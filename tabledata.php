<?php
 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo json_encode(array('message' => 'Database connection error.'));
    exit();
}

// Get data from table
$sql = "SELECT * FROM newleads";
$result = mysqli_query($conn, $sql);
// print_r($sql);
// die;
// Check if data exists
if (mysqli_num_rows($result) > 0) {
    
    $data = array();
    
    // Loop through data and add to array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    // Return data as JSON
    echo json_encode(array('status' => 200, 'data' => $data));
    
} else {
    echo json_encode(array('message' => 'No data found.'));
}

mysqli_close($conn);

?>
