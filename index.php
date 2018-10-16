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

    echo "Connected successfully"; 
    if(isset($_POST['card_id'])){
    	$sql = "SELECT * FROM UserData WHERE card_id ='" .$_POST['card_id'] ."' ";
    	$result = $conn->query($sql);
    	if($result->num_rows >0){
	while($row = $result->fetch_assoc()) {
   			 echo $row["student_id"];
    }
    }
}

 
$conn->close();


?>

<form action="/record.php" method="post">
  <input type="text" name="card_id" autofocus><br>
  <input type="submit">
</form>

</bosdy>
</html>