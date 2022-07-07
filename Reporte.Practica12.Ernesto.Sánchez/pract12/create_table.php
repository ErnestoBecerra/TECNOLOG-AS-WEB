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

// sql to create table
$sql = "CREATE TABLE datos (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
correo VARCHAR(50) NOT NULL,
asunto VARCHAR(30) NOT NULL,
telefono VARCHAR(10) NOT NULL,
mensaje  VARCHAR(100) 
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabla datos creada exitosamente";
} else {
  echo "Error creando tabla: " . $conn->error;
}

$conn->close();
?>