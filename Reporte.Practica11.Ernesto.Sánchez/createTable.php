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

// sql to create table
$sql = "CREATE TABLE alumnos (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
apellido VARCHAR(30) NOT NULL,
direccion VARCHAR(50) NOT NULL,
telefono VARCHAR(10) NOT NULL,
email VARCHAR(50) NOT NULL,
fecha_nac VARCHAR(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabla alumnos creada existosamente";
} else {
  echo "Error creando tabla: " . $conn->error;
}

$conn->close();
?>