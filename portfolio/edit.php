<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'proyecto_final'
) or die(mysqli_error($mysqli));
?>
<?php
// Definir variables vacías para evitar errores en caso de que no se definan más adelante
$num_accion = "";
$precio = "";
$fecha = "";

// Verificar si se ha pasado un ID de portafolio en la URL
if (isset($_GET['id_portafolio'])) {
  $id_portafolio = $_GET['id_portafolio'];

  // Realizar una consulta para obtener los detalles del portafolio con el ID correspondiente
  $query = "SELECT * FROM portafolio WHERE id_portafolio = $id_portafolio";
  $result = mysqli_query($conn, $query);

  // Verificar si se ha encontrado un registro con el ID
  if (mysqli_num_rows($result) == 1) {
    // Si se encuentra el registro, asignar sus valores a variables
    $row = mysqli_fetch_array($result);
    $id_portafolio =$row['id_portafolio'];
    $num_accion = $row['num_accion'];
    $precio = $row['precio'];
    $fecha = $row['fecha'];
  }
}

// Cuando se envía el formulario de actualización
if (isset($_POST['update'])) {
  $id_portafolio = $_GET['id_portafolio'];
  $num_accion = $_POST['num_accion'];
  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];

// Realizar una consulta UPDATE para actualizar el registro correspondiente
$query = "UPDATE portafolio SET num_accion = '$num_accion', precio = '$precio', fecha = '$fecha' WHERE id_portafolio = $id_portafolio";
mysqli_query($conn, $query);


  // Redirigir a la página de portafolio después de actualizar el registro
  header('Location: portfolio.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div>
  <form action="portfolio/edit.php?id_portafolio=<?php echo $_GET['id_portafolio']; ?>" method="POST">
    <div class="form-group">
    <input name="num_accion" type="text" class="form-control" value="<?php echo $num_accion; ?>" placeholder="Actualizar número acciones">
    </div>
    <div class="form-group">
      <input name="precio" type="text" class="form-control" value="<?php echo $precio;?>" placeholder="Actualizar precio">
    </div>
    <div class="form-group">
      <input name="fecha" type="date" class="form-control" value="<?php echo $fecha;?>" placeholder="Actualizar fecha">
    </div>
    <button class="btn-success" name="update">
      Update
    </button>
  </form>
</div>
</body>
</html>


