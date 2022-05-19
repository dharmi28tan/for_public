<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "employee";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
 
$id = $request->id;  
$sql = "DELETE FROM users_data WHERE id = '$id'";  
if(mysqli_query($conn, $sql)){  
    $arr = array('message' => "success", 'status1' => "Delete Successfull...");
	echo json_encode($arr);
}  
$conn->close();
?>