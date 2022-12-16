<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "yahoo_baba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    $id=$_POST['id'];
    $sql = "SELECT * FROM students where id=$id";
    $data=[];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $data['status']=200;
      $data['result'] = $result -> fetch_all(MYSQLI_ASSOC);
      $data['message'] = 'Successful';

    }
    echo json_encode($data);
    $conn->close();
}
?>