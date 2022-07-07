<?php
$servername = "localhost";
$username = "root";
$password = "sabe010130";
$dbname = "contacto_prueba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Conexion fallida: " . $conn->connect_error);
}

// prepare and bind
if (isset($_POST['submit'])) {
	$stmt = $conn->prepare("INSERT INTO datos (nombre,correo,asunto,telefono,mensaje) VALUES (?, ?, ?, ?, ?)");
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$asunto = $_POST['asunto'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];
	$stmt->bind_param("sssss", $nombre, $correo, $asunto, $telefono, $mensaje);
	if ($stmt->execute()) {
		$success_message = "Enviado exitosamente";
	} else {
		$error_message = "Problem in Adding New Record";
	}
	$stmt->close();
	$conn->close();
}


?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="recursos/favicon.ico">
    <title>Ernesto Sánchez CV</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>
 
<header>

    <div class="user">
        <img src="recursos/IMG_20210815_221337.jpg" alt="">
        <h3 class="name">Ernesto Daniel Sánchez Becerra</h3>
        <p class="post">Ingeniero en Sistemas Computacionales</p>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="index.html">Página Principal</a></li>
            <li><a href="info.html">Información</a></li>
            <li><a href="trayectoria.html">Trayectoria</a></li>
            <li><a href="proyectos.html">Proyectos</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>

</header>

<div id="menu" class="fas fa-bars"></div>

<section class="contact" id="contact">
    <h1 class="heading"> <span>Formulario</span> de Contacto </h1>
    
    <div class="row">
    
        <div class="content">
    
            <h3 class="title">Datos de contacto</h3>
    
            <div class="info">
                <h3> <i class="fas fa-envelope"></i> asanchezrosete@gmail.com </h3>
                <h3> <i class="fas fa-phone"></i> +52- 5547926713</h3>
                <h3> <i class="fas fa-phone"></i> +52- 5526044256 </h3>
                <h3> <i class="fas fa-map-marker-alt"></i> Ciudad de México- Iztapalapa. </h3>
            </div>
    
        </div>
    
        <form name="formulario" method="post" action="">
    
            <input type="text" name = "nombre" placeholder="Nombre" class="box">
            <input type="email" name = "correo" placeholder="Correo" class="box">
            <input type="text" name="asunto" placeholder="Asunto / Proyecto" class="box">
            <input type="text" name="telefono" placeholder="Teléfono" class="box">
            <textarea name="mensaje" id="" cols="30" rows="10" class="box message" placeholder="Mensaje"></textarea>
            <button type="submit" name ="submit" class="btn"> Enviar <i class="fas fa-paper-plane"></i> </button>
    
        </form>
    
    </div>
    
    </section>
    
    <!-- contact section ends -->

</body>
</html>