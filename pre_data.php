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

$sql = "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('404410069', '9591B537','吳子楊','./img/1.jpg',0);";
$sql .= "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('405520096', 'b590c738','林冠儀','./img/2.jpg',0);";
$sql .= "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('406530014', '95CDCB2F','葉澤邦','./img/7.jpg',0);";
$sql .= "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('404515075', 'D548C92F','謝佩玲','./img/5.jpg',0);";
$sql .= "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('406125046', 'a5f1a833','黃麒峯','./img/4.jpg',0);";
$sql .= "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('404115017', '404115017','許淨淇','./img/6.jpg',0);";
$sql .= "INSERT INTO UserData (student_id,card_id,name,img_url,state)
VALUES ('404110052', '7549c738','陳詩婷','./img/3.jpg',0)";



if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>