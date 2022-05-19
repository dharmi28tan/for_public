<?php
// error_reporting(0);
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
$name = addslashes($request->name);
$email = addslashes($request->email);
$age = addslashes($request->age);
$gender = addslashes($request->gender);
$pass = addslashes($request->pass);

if(!empty($name) && !empty($email) && !empty($age) && !empty($gender) && !empty($pass))
{
	$sql = "INSERT INTO users_data"."(name,email,age,gender,pass)"."VALUES"."('$name','$email','$age','$gender','$pass')";
}
if(mysqli_query($conn, $sql)){  
    $arr = array('message' => "success", 'status1' => "Registration Successfull...");
    echo json_encode($arr);
    }
// Closing connection
$conn->close();
?>