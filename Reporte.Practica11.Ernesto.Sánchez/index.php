<?php
require_once("data_base.php");
?>
<html>

<head>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="estilos/reset.css">
	<link rel="stylesheet" href="estilos/styles3.css">
	<link rel="icon" type="image" href="recursos/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Página principal</title>
</head>

<body>
	<header class="main-header">
		<nav class="main-nav">
			<div class="logo">
				<span>Práctica 11</span>
			</div>
			<ul>

				<li><a href="forms.php">ALTAS</a></li>
				<li><a href="update_user.php">MODIFICACIONES</a></li>
				<li><a href="show_table.php">LISTADOS</a></li>
				<li><a href="delete_user.php">BAJAS</a></li>
			</ul>
		</nav>
		<div class="content-header">
			<h1>
				Práctica 11
			</h1>
			<p>Página principal para la inscripción de alumnos en una base de datos usando PHP y phpMyAdmin</p>

		</div>
	</header>
</body>

</html>