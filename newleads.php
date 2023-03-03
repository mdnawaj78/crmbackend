<?php
 
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Allow-Headers: Content-Type");
 
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
 

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $source = mysqli_real_escape_string($conn, $_POST['source']);
    $interest = mysqli_real_escape_string($conn, $_POST['interest']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

     $sql = "INSERT INTO `newleads` (`status`, `name`, `email`, `phone`, `country`, `interest`, `source`, `remarks`) 
            VALUES ('$status', '$name', '$email', '$phone', '$country', '$interest', '$source', '$remarks')";
      $result = mysqli_query($conn, $sql);
     
    //   $result = mysqli_fetch_array($result);
     if ($result) {
         echo json_encode(array('status' => 200, 'message' => 'Data created successfully!'));
     } else {
         echo json_encode(array('message' => 'Failed to create data.'));
     }
    
}
mysqli_close($conn);
?>
