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

$sql = "SELECT * FROM datos";
$result = $conn->query($sql);
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="recursos/favicon.ico">
    <title>Ernesto Sánchez CV</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="estilos/style_3.css">
</head>

<body>

    <div class="button_link"><a href="index.html"> Página principal </a></div>
    <div class="datatable-container">
        <div class="header-tools">
            <div class="tools">
                <ul>
                    <li><span><input type="checkbox"></span></li>
                    <li>
                        <a href="contacto.php"><button >
                            <i class="material-icons">add_circle</i>
                        </button></a>
                    </li>
                    <li>
                        <button>
                            <i class="material-icons">edit</i>
                        </button>
                    </li>
                    <li>
                        <button>
                            <i class="material-icons">delete</i>
                        </button>
                    </li>
                    <li>
                    <a href="solicitudes.php"><button>
                            <i class="material-icons">share</i>
                        </button></a>
                    </li>
                </ul>
            </div>
            <div class="search">
                <input type="text" name="" id="" class="search-input">
            </div>
        </div>
        <table class="datatable">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Nombre </th>
                    <th> Correo </th>
                    <th> Asunto / Proyecto </th>
                    <th> Telefono </th>
                    <th> Mensaje </th>
                    <th> Eliminar </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr id="row-<?php echo $row["id"]; ?>">
                            <td> <?php echo $row["id"]; ?> </td>
                            <td><?php echo $row["nombre"]; ?></td>
                            <td><?php echo $row["correo"]; ?></td>
                            <td><?php echo $row["asunto"]; ?></td>
                            <td><?php echo $row["telefono"]; ?></td>
                            <td><?php echo $row["mensaje"]; ?></td>
                            <td><a href="deleted.php?id=<?php echo $row["id"]; ?>"><button>
                            <i class="material-icons">delete</i>
                        </button></a></td>
                    <?php
                    }
                }
                    ?>
            </tbody>
        </table>
        <div class="footer-tools">
            <div class="pages">
                <ul>
                    <li><span class="active">1</span></li>
                    <li><button>2</button></li>
                    <li><button>3</button></li>
                    <li><button>4</button></li>
                    <li><span>...</span></li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>