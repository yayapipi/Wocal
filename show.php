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



if(isset($_GET['student_id'])){

	$sql = "SELECT * FROM d" .$_GET['student_id'];
	$result = $conn->query($sql);
	if($result){
if($result->num_rows >0){
	$i = 0;
	while($row = $result->fetch_assoc()) {
		$t_date[$i] = $row["t_date"];
		$t_work[$i] = $row["t_work"];
		$t_drop[$i] = $row["t_drop"];
		$i++;
	}
}else{
	$i =0;
}
}else{
	$i=-1;
}
}else{
	$i =0;
}

$conn->close();
?>


<form action="/display.php" method="post">
	<div class="limiter">
		<div class="container-login100">
			<div class="table-login800">
				
				
				<form class="login100-form validate-form">

					<span class="login100-form-title p-b-26">

						 Time Log Of 
						<?php 
							if(isset($_GET['student_id'])){
								echo $_GET['student_id'];
							}
							if($i<0){
								echo " Is Not Found! :(";
							}
						?>
						 
					</span>
					<button type="submit" class=" btn-default" style="display: block; margin: 0 auto;">Display Log</button>
					<span class="login100-form-title p-b-48">
						
						<!--<img src="./img/1.jpg" width="100px" height="100px"></img>-->
					</span>

					<table class="table table-hover">
    <thead>
      <tr>
        <th>Date</th>
        <th>Work Time</th>
        <th>Drop Time</th>
      </tr>
    </thead>
    <tbody>

    	<?php 
    		$j=0;
    		while($j<$i){
    			echo"<tr><td>";
        		echo $t_date[$j];
        		echo "</td>";
        		echo "<td>";
        		echo $t_work[$j];
        		echo "</td>";
        		echo "<td>";
        		echo $t_drop[$j];
        		echo "</td></tr>";
       			$j++;	
    		}

    	?>
    </tbody>
  </table>

					
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