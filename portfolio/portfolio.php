<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'proyecto_final'
) or die(mysqli_error($mysqli));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
</head>
<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
                <h1 class="h1">Portfolio</h1>
                <form action="save_task.php" method="POST">
                <div class="form-group">
                    <input name="num_accion" type="text" class="form-control" placeholder="Tu número de acciones aquí...">
                </div>
                <div class="form-group">
                    <input name="precio" type="text" class="form-control" placeholder="Tu precio aquí...">
                </div>
            
                <div class="form-group">
                    <input name="fecha" type="date" class="form-control" placeholder="Tu fecha de compra aquí...">
                </div>
                <button class="btn btn-success" name="save_task">
                    Introducir movimiento
                </button>
                </form>
            </br>
        </div>
    </div>
</div>

<div>
<?php
// construct SQL query
$sql = "SELECT id_portafolio, num_accion, precio, fecha FROM portafolio";

// execute query and store result
$result = mysqli_query($conn, $sql);

// check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<table>
    <tr>
        <th>Acciones</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["num_accion"]; ?></td>
            <td><?php echo $row["precio"]; ?></td>
            <td><?php echo $row["fecha"]; ?></td>
            <td>
                <a href="delete_task.php?id_portafolio=<?php echo $row['id_portafolio']?>" class="btn btn-danger">
                <button>delete</button>
                </a>
            </td>
            <td><a href="edit.php"><button class="btn btn-success" name="delete">
                    edit
                </button></a></td></td>
        </tr>
    <?php } ?>
</table>

</div>
</body>
</html>
