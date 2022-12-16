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
    $search_data=$_POST['searchData'];
    $sql = "SELECT * FROM students where first_name like '".$search_data."%' or last_name like '".$search_data."%'";
    $result = $conn->query($sql);

    $output='';

    if ($result->num_rows > 0) {
    // output data of each row
    
        $cnt=1;
        while($row = $result->fetch_assoc()) {
            $output.='<tr>
            <td>'.$cnt++.'</td>
            <td>'.$row["first_name"].'</td>
            <td>'.$row["last_name"].'</td>
            <td><input type="button" class="btn btn-warning" name="edit" data-eid="'.$row["id"].'" value="Edit"></td>
            <td><input type="button" class="btn btn-danger" name="delete" data-id="'.$row["id"].'" value="Delete"></td>

        </tr>';
        }
    } else {
        $output.='<tr>
        <td colspan="3">There is no records</td>
      </tr>';
    }
    $conn->close();
    echo $output;

}
?>