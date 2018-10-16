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
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

    if(isset($_POST['card_id'])){
    	$sql = "SELECT * FROM UserData WHERE card_id ='" .$_POST['card_id'] ."' ";
    	$result = $conn->query($sql);
    	if($result->num_rows >0){
			echo "Date &nbsp Work Time&nbspBack Time<br>";
			while($row = $result->fetch_assoc()) {
   			$sql2 = "SELECT * FROM d".$row["student_id"];
			$result2 = $conn->query($sql2);
				if($result2->num_rows >0){
					while($row2 = $result2->fetch_assoc()) {
						echo $row2["t_date"];
						echo "&nbsp";
						echo $row2["t_work"];
						echo "&nbsp";
						echo $row2["t_drop"];
						echo "<br>";
					}
				}
			}
			
		}
	}




$conn->close();
?>
</body>
</html>