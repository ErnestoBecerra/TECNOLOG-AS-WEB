<?php 
	$servername = "localhost";
	$username = "root";
	$password = "sabe010130";
	$dbname = "inscripciones";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	
	$sql = $conn->prepare("DELETE  FROM alumnos WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:index.php');		
?>