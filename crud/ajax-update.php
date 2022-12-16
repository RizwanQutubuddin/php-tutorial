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
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];

    $sql = "UPDATE students SET first_name='".$first_name."', last_name='".$last_name."' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>