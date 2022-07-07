<?php
$servername = "localhost";
$username = "root";
$password = "sabe010130";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE inscripciones";
if ($conn->query($sql) === TRUE) {
  echo "Base de datos creada exitosamente";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>