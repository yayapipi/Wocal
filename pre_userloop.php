<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Wocal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT student_id FROM UserData";
$result = $conn->query($sql);

if($result->num_rows >0){
	while($row = $result->fetch_assoc()) {
		$sql_create_table = "CREATE TABLE D";
		$sql_create_table .= $row["student_id"];
		$sql_create_table .=" (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,t_date date,t_work time,t_drop time);";
		if ($conn->query($sql_create_table) === TRUE) {
   			 echo "New record created successfully";
		} else {
 			   echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
}



$conn->close();
?>
</body>
</html>