<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'proyecto_final'
) or die(mysqli_error($mysqli));

?>
<?php
if(isset($_GET['id_portafolio'])) {
  $id = $_GET['id_portafolio'];
  $query = "DELETE FROM portafolio WHERE id_portafolio = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  $result = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  if(!$result) {
    die("Query Failed.");
  }

  header('Location: portfolio.php');
}


?>
