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
			while($row = $result->fetch_assoc()) {
   			echo $row["name"];
			if($row["state"]==0){
				 $sql1 = "INSERT INTO d" .$row["student_id"] ." (t_date,t_work) VALUES(CURDATE(),CURTIME())";
				 $conn->query($sql1);
				 //Setting User State To 1
				 $sql2 = "UPDATE UserData SET state=1 WHERE card_id='" .$_POST['card_id'] ."'";
				 $conn->query($sql2);
				 echo "Work Sucess";
			 }else{
				 $maxsql = "SELECT * FROM d".$row["student_id"]." ORDER BY id DESC LIMIT 1";
				 $run= $conn->query($maxsql);
				 while($row2 = $run->fetch_assoc()) {
				 $sql3 = "UPDATE d".$row["student_id"]." SET t_drop=CURTIME() WHERE id= ".$row2["id"];
				 $conn->query($sql3);
				 }
				 //Setting User State To 0
				 $sql4 = "UPDATE UserData SET state=0 WHERE card_id='" .$_POST['card_id'] ."'";
				 $conn->query($sql4);
				 echo "Bye Sucess";
			 }
			 
			 
		}
		
		
		}else{
			echo "Not Found";
		}
	
	header( "refresh:1.5;url=index.php" );
}



$conn->close();
?>
</body>
</html>