<?php
$servername = "database-1.xxxx.us-east-1.rds.amazonaws.com"; // RDS Endpoint
$username = "admin"; // RDS username
$password = "Pass"; // RDS Password
$dbname = "mydb"; // RDS Database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$sql = "INSERT INTO users (name) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
