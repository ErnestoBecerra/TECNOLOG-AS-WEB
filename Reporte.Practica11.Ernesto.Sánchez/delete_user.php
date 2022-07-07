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

$sql = "SELECT * FROM alumnos";
$result = $conn->query($sql);
?>
<html>
<style>
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

    .tbl-qa {
        width: 100%;
        font-size: 0.9em;
        background-color: #6ab5b9;
        border-spacing: 1px;
        border-radius: 4px;
    }

    .tbl-qa th.table-header {
        padding: 5px;
        text-align: left;
        padding: 10px;
        color: #FFF;
        font-weight: normal;
    }

    .tbl-qa .table-row td {
        padding: 10px;
        background-color: #ebf6f7;
        vertical-align: top;
    }
</style>
<head>
		<link rel="icon" type="image" href="recursos/favicon.ico">
	</head>
<body>
    
    <div class="button_link"><a href="index.php">Página principal </a></div>
    <table class="tbl-qa">
        <thead>
            <tr>
                <th class="table-header" width="20%"> Id </th>
                <th class="table-header" width="20%"> Nombre </th>
                <th class="table-header" width="20%"> Apellido </th>
                <th class="table-header" width="20%"> Direccion </th>
                <th class="table-header" width="20%"> Telefono </th>
                <th class="table-header" width="20%"> Email </th>
                <th class="table-header" width="20%"> Fecha_nac </th>
                <th class="table-header" width="20%" colspan="2">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr class="table-row" id="row-<?php echo $row["id"]; ?>">
                        <td class="table-row"> <?php echo $row["id"]; ?> </td>
                        <td class="table-row"><?php echo $row["nombre"]; ?></td>
                        <td class="table-row"><?php echo $row["apellido"]; ?></td>
                        <td class="table-row"><?php echo $row["direccion"]; ?></td>
                        <td class="table-row"><?php echo $row["telefono"]; ?></td>
                        <td class="table-row"><?php echo $row["email"]; ?></td>
                        <td class="table-row"><?php echo $row["fecha_nac"]; ?></td>
                        <td class="table-row" colspan="2"><a href="deleted.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Delete" onClick="return confirm('Are you sure you want to delete?')" src="delete.png" /></a></td>
                <?php
                }
            }
                ?>
        </tbody>
    </table>
</body>

</html>