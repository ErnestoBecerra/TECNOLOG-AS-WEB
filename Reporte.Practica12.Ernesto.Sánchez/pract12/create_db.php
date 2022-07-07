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
echo "Conexion exitosa  ";
echo "\n";

// Create database
$sql = "CREATE DATABASE contacto_prueba";
if ($conn->query($sql) === TRUE) {
  echo "Base de datos creada exitosamente";
} else {
  echo "Error creando la base de datos: " . $conn->error;
}

$conn->close();
?>