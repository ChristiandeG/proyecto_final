<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'proyecto_final'
) or die(mysqli_error($mysqli));

?>

<?php
// El post del formulario nos lleva aquí --> Insertamos el registro en la base de datos
if (isset($_POST['save_task'])) {
  $num_accion = $_POST['num_accion'];
  $precio = $_POST['precio'];
  $fecha = $_POST['fecha'];
  $query = "INSERT INTO portafolio(num_accion, precio, fecha) VALUES ('$num_accion', '$precio', '$fecha')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
}
header("Location: portfolio.php");
?>
