<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ride Working System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<!--Record and Update Database Code -->
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
   			//echo $row["name"];

   			//Setting Data Variable
   			$name = $row['name'];
   			$student_id = $row['student_id'];
   			$img_url = $row['img_url'];

			if($row["state"]==0){
				 $sql1 = "INSERT INTO d" .$row["student_id"] ." (t_date,t_work) VALUES(CURDATE(),CURTIME())";
				 $conn->query($sql1);
				 $sql_time = "SELECT * FROM d".$row["student_id"]." ORDER BY id DESC LIMIT 1";
				 $result_time = $conn->query($sql_time);
				 if($result_time->num_rows >0){
					while($row_time = $result_time->fetch_assoc()) {
						$current_date = $row_time['t_date'];
						$current_time = $row_time['t_work'];
					}
				}
				 //Setting User State To 1
				 $sql2 = "UPDATE UserData SET state=1 WHERE card_id='" .$_POST['card_id'] ."'";
				 $conn->query($sql2);
				 $state = 1;
				 //echo "Work Sucess";
			 }else{
				 $maxsql = "SELECT * FROM d".$row["student_id"]." ORDER BY id DESC LIMIT 1";
				 $run= $conn->query($maxsql);
				 while($row2 = $run->fetch_assoc()) {
				 $sql3 = "UPDATE d".$row["student_id"]." SET t_drop=CURTIME() WHERE id= ".$row2["id"];
				 $conn->query($sql3);
				 }
				 $sql_time = "SELECT * FROM d".$row["student_id"]." ORDER BY id DESC LIMIT 1";
				 $result_time = $conn->query($sql_time);
				 if($result_time->num_rows >0){
					while($row_time = $result_time->fetch_assoc()) {
						$current_date = $row_time['t_date'];
						$current_time = $row_time['t_drop'];
					}
				}
				 //Setting User State To 0
				 $sql4 = "UPDATE UserData SET state=0 WHERE card_id='" .$_POST['card_id'] ."'";
				 $conn->query($sql4);
				 $state = 0;
				// echo "Bye Sucess";
			 }


			 
		}
		
		
		}else{
			//echo "Not Found";
		}
	
	header( "refresh:1.25;url=index.php" );
}



$conn->close();
?>


<form action="/record.php" method="post">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						<?php 

							if(isset($state)){
								if($state==1){
									echo "<span style='color:green'>Work Time:</span><br><hr>";
									echo $current_time;
								}
								else{
									echo "<span style='color:red'>Bye Bye Time:</span><br><hr>";
									echo $current_time;
								}
							}else{
								echo "<span style='color:red'>Not Found</span><br><hr>";
							}
							
						?>

					</span>
					<span class="login100-form-title p-b-48">
						<?php 
							if(isset($img_url)){
							echo "<img src='";
							echo $img_url;
							echo "' width='100px' height='100px' class='img-rounded'>";
							}
						?>
					</span>


					<div>
						<span class="login100-form-title p-b-26">
							<b>
						<?php 
							if(isset($name)){
							echo $name;
							echo "<br>";
							echo $student_id;
							echo "<br>";
							}
							
						?>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							
							<button class="login100-form-btn" type="submit" disabled>
								<?php 
								if(isset($state)){
							if($state==1){
								echo "Work Success";
								//echo "<span style='color:green'>Work Success</span>";
							}
							else{
								echo "Bye Bye";
								//echo "<span style='color:red'>Bye Bye</span>";
							}
						}else{
							echo "Who Are You ?";
						}
							
						?>
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						
						<?php 
							if(isset($current_date))
								echo $current_date;
							
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</form>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>