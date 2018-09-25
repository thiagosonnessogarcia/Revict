<?php
$servername = "localhost";
$database = "revict";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO dividas (nomegasto, divida) VALUES ('Carro', '21000')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br />" . mysqli_error($conn);
}
mysqli_close($conn);

?>