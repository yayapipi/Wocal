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

// sql to create table
$sql = "CREATE TABLE UserData (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
student_id VARCHAR(30),
card_id VARCHAR(30),
name VARCHAR(30) NOT NULL,
img_url VARCHAR(2086),
state INT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table UserData created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>