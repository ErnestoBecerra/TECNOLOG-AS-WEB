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
	if (isset($_POST['submit'])) {		
		$stmt = $conn->prepare("UPDATE alumnos SET nombre=? , apellido=? , direccion=?, telefono=?, email=?, fecha_nac=?  WHERE id=?");
		$nombre=$_POST['nombre'];
		$apellido = $_POST['apellido'];
		$direccion= $_POST['direccion'];
		$telefono= $_POST['telefono'];
		$email= $_POST['email'];
		$fecha_nac= $_POST['fecha_nac'];
		$stmt->bind_param("ssssssi",$nombre, $apellido, $direccion, $telefono, $email, $fecha_nac,$_GET["id"]);	
		if($stmt->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$stmt = $conn->prepare("SELECT * FROM alumnos WHERE id=?");
	$stmt->bind_param("i",$_GET["id"]);			
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image" href="recursos/favicon.ico">
	<title>Formulario actualizacion</title>
<style>

   	input {
  
  border-style: none;
  background-color: ghostwhite ;
  width: 100%;
  height: auto;
  outline: none;
 }
   hr{
	   height:0px;

 border: 2px solid currentColor;
 width: 80%;
   }
   fieldset{
	   border-style: none;
   }
   table{
	   align-content: center;
	   width: 100%;
   }
   td{
	   border-style: solid;
	   border-width: 1px;
	   

   }
   .contenedor{
	   border-width: 5px;
	   border-style: double;
	   
	   border-color: #374B45;
	   
 
	   
	   color: teal;
   }
   .titulo{
	   background-color: steelblue ;
	   color: white;
	   opacity: 0.75;
   }
   #titulo{
	   background-color: white ;
	   color: red;

   }
   #Principal{
	   background-color: ghostwhite;
	   padding-top: 5px;
	   padding-right: 20%;
	   padding-left: 20%;
   }
   select{
	   width: 100px;
	   border: none;
	   background-color: ghostwhite;
	   outline: none;

   }
   .button_link {
	   padding: 20px 0px;
	   text-align: right;
   }
.button_link a{
   color: white;
   text-decoration: none;
   background-color: steelblue;
   padding: 8px 20px;
   font-size: 0.8em;
   border: #428a8e 1px solid;    
   border-radius: 4px;
}
</style>
</head>
<body>
<div id="Principal">
		<form id="formulario" action="" method="post">
		<div class="button_link"><a href="index.php"> Página principal </a></div>
			<div class="contenedor" id="titulo">
				<fieldset>
				<h1 style="text-align: center;">FORMULARIO DE INSCRIPCIÓN</h1>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo">
				<fieldset>
					<h2 style="color: black;">DATOS PERSONALES</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor" id="datos">
				<fieldset>
					<table cellpadding=5px cellspacing=5px align="center">
						<tr>
							<td style="background-color: steelblue;color: black;">Nombre:</td>
							<td width=90%><input type="text" name="nombre" value="<?php echo $row["nombre"]?>"></td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Apellido:</td>
							<td><input type="text" name="apellido" value="<?php echo $row["apellido"]?>"></td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Direcci&oacute;n:</td>
							<td><input type="text" name="direccion" value="<?php echo $row["direccion"]?>"></td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Tel&eacute;fono:</td>
							<td><input type="tel" name="telefono" value="<?php echo $row["telefono"]?>"></td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Correo electr&oacute;nico:</td>
							<td><input type="text" name="email" value="<?php echo $row["email"]?>"></td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Documento:</td>
							<td><input type="text" name="documento" placeholder="Haga click aqui para escribir texto"></td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Fecha de nacimiento:</td>
							<td><input type="date" name="fecha_nac" value="<?php echo $row["fehca_nac"]?>"></td>
						</tr>

					</table>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo" id="capacitacion">
				<fieldset>
					<h2 style="color: black;">CAPACITACIÓN</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor" id="curso">
				<fieldset>
					<table>
					<tr>
						<td style="background-color: steelblue;color: black;">Curso</td>
						<td>
							<label for="menu">Elija un curso</label>
							<select name="menu">
  								<option value="0">...</option>
  								<option value="1">Uno</option>
  								<option value="2">Dos</option>
 								<option value="3">Tres</option>
							</select>
						</td>
						<td colspan="5" style="background-color: steelblue;color: black;">Días</td>
					</tr>
					<tr>
						<td style="background-color: steelblue;color: black;">Horario</td>
						<td>Elige un horario</td>
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
					<h2 style="color: black;">PLAN DE PAGO</h2>
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
							<td width=50% style="background-color: steelblue;color: black;">Contado</td>
							<td width=50%>Moneda</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="modo_pago" value="credito">
							</td>
							<td style="background-color: steelblue;color: black;">Crédito</td>
							<td>Tarjeta</td>
						</tr>
					</table>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor titulo" id="institucion">
				<fieldset>
					<h2 style="color: black;">DATOS DE LA INSTITUCIÓN</h2>
				</fieldset>
			</div>
			<hr>
			<div class="contenedor">
				<fieldset>
					<table>
						<tr>
							<td  style="background-color: steelblue;color: black;">No. de contrato</td>
							<td width=50%>
								<input type="text" name="contrato" placeholder="Haga click aqui para escribir texto">
							</td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Personas que atendio</td>
							<td>
								<input type="text" name="personas" placeholder="Haga click aqui para escribir texto">
							</td>
						</tr>
						<tr>
							<td style="background-color: steelblue;color: black;">Fecha de inscripci&oacute;n</td>
							<td>
								<input type="date" name="inscripcion">
							</td>
						</tr>
						<tr>
						<td colspan="2" ><input type="submit" name="submit" value="Registrar" style="background-color: steelblue; color:white;"></td>
						</tr>
					</table>
				</fieldset>
			</div>
			
		</form>
		
	</div>
</body>
</html>