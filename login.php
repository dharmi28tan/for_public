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
// When form submitted, check and create user session.
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$email = $request->email; 
$pass = $request->pass;
// Check user is exist in the database
$sql = "SELECT * FROM users_data WHERE email='$email' AND pass='$pass'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());   
$rows = mysqli_num_rows($result);

if($rows > 0){
    $arr = array('message' => "success", 'status1' => "Login Successfull...");
    echo json_encode($arr);
}
$conn->close();
?>