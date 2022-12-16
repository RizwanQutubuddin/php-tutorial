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

    $sql = "DELETE from students where id=$id";
    $result = $conn->query($sql);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
    $conn->close();
}
?>