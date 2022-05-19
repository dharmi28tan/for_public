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
	$name = $request->name;
	$email = $request->email;
	$age = $request->age;
	$gender = $request->gender;

	$sql = "UPDATE users_data SET name = '$name', email = '$email', age = '$age', gender = '$gender' WHERE id = '$id'";
	if(mysqli_query($conn, $sql)){  
	    $arr = array('message' => "success", 'status1' => "Update Successfull...");
	    echo json_encode($arr);
    }
	$conn->close();
?>