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

// prepare and bind
if (isset($_POST['submit'])) {
	$stmt = $conn->prepare("INSERT INTO alumnos (nombre,apellido,direccion,telefono,email,fecha_nac) VALUES (?, ?, ?, ?, ?, ?)");
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$fecha_nac = $_POST['fecha_nac'];
	$stmt->bind_param("ssssss", $nombre, $apellido, $direccion, $telefono, $email, $fecha_nac);
	if ($stmt->execute()) {
		$success_message = "Added Successfully";
	} else {
		$error_message = "Problem in Adding New Record";
	}
	$stmt->close();
	$conn->close();
}


?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image" href="recursos/favicon.ico">
	<title>Formulario de inscripción</title>
</head>
<style>
	* {
    font-family: "Arial";
    font-weight: bold;
}

#Principal {
    background-color: whitesmoke;
    padding-top: 20px;
    padding-bottom: 20px;
	padding-right: 20%;
	padding-left: 20%;
}

input {
    border-style: none;
    background-color: whitesmoke;
    width: 100%;
    height: auto;
    outline: none;
}

hr {
    height: 0px;
    color: whitesmoke;
    border: 1px solid currentColor;
    width: 80%;
}

fieldset {
    border-style: none;
}

table {
    align-content: center;
    width: 100%;
}

td {
    border-style: solid;
    border-width: 1px;
}

.contenedor {
    border-width: 6px;
    border-style: double;
    border-color: midnightblue;
    text-align: center;
    color: midnightblue;
}

.titulo {
    background-color: skyblue;
    color: midnightblue;
    opacity: 0.70;
}

#titulo {
    background-color: skyblue;
    color: midnightblue;
}

select {
    width: 100px;
    border: none;
    background-color: skyblue;
    outline: none;

}


	.button_link {
		padding: 20px 0px;
		text-align: right;
	}

	.button_link a {
		color: white;
		text-decoration: none;
		background-color: steelblue;
		padding: 8px 20px;
		font-size: 0.8em;
		border: #428a8e 1px solid;
		border-radius: 4px;
	}
</style>

<body>
	<div id="Principal">
		<form id="formulario" action="" method="post">
			<div class="button_link"><a href="index.php"> Página principal </a></div>
			<div class="contenedor" id="titulo">
				<fieldset>
					<h1>Formulario de inscripción</h1>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo">
				<fieldset>
					<h2>Datos personales</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor" id="datos">
				<fieldset>
					<table cellpadding=5px cellspacing=5px align="center">
						<tr>
							<td>Nombre:</td>
							<td width=90%><input type="text" name="nombre" placeholder="Haga click aquí para escribir texto"></td>
						</tr>
						<tr>
							<td>Apellido:</td>
							<td><input type="text" name="apellido" placeholder="Haga click aquí para escribir texto"></td>
						</tr>
						<tr>
							<td>Direcci&oacute;n:</td>
							<td><input type="text" name="direccion" placeholder="Haga click aquí para escribir texto"></td>
						</tr>
						<tr>
							<td>Tel&eacute;fono:</td>
							<td><input type="tel" name="telefono" placeholder="55-##-##-##-##" required></td>
						</tr>
						<tr>
							<td>Correo electr&oacute;nico:</td>
							<td><input type="text" name="email" placeholder="ejemplo@extensión"></td>
						</tr>
						<tr>
							<td>Documento:</td>
							<td><input type="text" name="documento" placeholder="Haga click aquí para escribir texto"></td>
						</tr>
						<tr>
							<td>Fecha de nacimiento:</td>
							<td><input type="date" name="fecha_nac" placeholder="Seleccione fecha"></td>
						</tr>

					</table>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo" id="capacitacion">
				<fieldset>
					<h2>Capacitaci&oacute;n</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor" id="curso">
				<fieldset>
					<table>
						<tr>
							<td>Curso</td>
							<td>
								<select name="menu">
									<option value="0">Elija un curso</option>
									<option value="1">Uno</option>
									<option value="2">Dos</option>
									<option value="3">Tres</option>
								</select>
							</td>
							<td colspan="5">Días</td>
						</tr>
						<tr>
							<td>Horario</td>
							<td>Elija un horario</td>
							<td><input type="checkbox" name="lunes">Lunes</td>
							<td><input type="checkbox" name="martes">Martes</td>
							<td><input type="checkbox" name="miercoles">Miercoles</td>
							<td><input type="checkbox" name="jueves">Jueves</td>
							<td><input type="checkbox" name="viernes">Viernes</td>
						</tr>
					</table>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo" id="pago">
				<fieldset>
					<h2>Plan de pago</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor" id="plan">
				<fieldset>
					<table>
						<tr>
							<td width=10%>
								<input type="radio" name="modo_pago" value="contado">
							</td>
							<td width=50%>Contado</td>
							<td width=50%>Moneda</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="modo_pago" value="credito">
							</td>
							<td>Credito</td>
							<td>Tarjeta</td>
						</tr>
					</table>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo" id="institucion">
				<fieldset>
					<h2>Datos de la instituci&oacute;n</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor">
				<fieldset>
					<table>
						<tr>
							<td>No. de contrato</td>
							<td width=50%>
								<input type="text" name="contrato" placeholder="Haga click aqui para escribir">
							</td>
						</tr>
						<tr>
							<td>Personas que atendio</td>
							<td>
								<input type="text" name="personas" placeholder="Haga click aqui para escribir">
							</td>
						</tr>
						<tr>
							<td>Fecha de inscripci&oacute;n</td>
							<td>
								<input type="date" name="inscripcion">
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit" value="Enviar" style="background-color: steelblue; color:white;"></td>
						</tr>
					</table>
				</fieldset>
			</div>

		</form>

	</div>

</body>

</html>