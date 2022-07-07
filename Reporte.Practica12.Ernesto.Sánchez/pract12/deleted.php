<?php 
	$servername = "localhost";
	$username = "root";
	$password = "sabe010130";
	$dbname = "contacto_prueba";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	
	$sql = $conn->prepare("DELETE  FROM datos WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:solicitudes.php');		
?>