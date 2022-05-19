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

$data = json_decode(file_get_contents("php://input"));
// $request = $data->request;

$sql = mysqli_query($conn,"SELECT * FROM users_data");
$data = array();

while ($row = mysqli_fetch_array($sql)) {
    $data[] = array("id"=>$row['id'],"name"=>$row['name'],"email"=>$row['email'],"age"=>$row['age'],"gender"=>$row['gender']);
}
echo json_encode($data);

$conn->close();
?>