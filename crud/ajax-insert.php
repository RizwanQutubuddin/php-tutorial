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

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];

    $sql = "INSERT INTO students(first_name,last_name) values('{$first_name}','{$last_name}')";
    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>