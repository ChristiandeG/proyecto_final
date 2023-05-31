<?php


$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'proyecto_final'
) or die(mysqli_error($mysqli));

?>
<?php
if(isset($_SESSION["user_id"])){
    header("Location: index.php");
}
if (isset($_POST['register'])) {
    //Probando el registro
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $url = $_POST['url'];

    // Comprueba que el correo no esté registrado
    $query = "SELECT * FROM users WHERE correo = '$correo'";
    $resultado_existe_user = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado_existe_user) >= 1) {
        // El correo ya existe y no se puede crear otra cuenta con ese nombre
        header("Location: principal.php");
    } else {
        // Crear usuario en la base de datos
        $query_insert_new_user = "INSERT INTO users (nombre, tipo, correo, password, url) VALUES ('$nombre','$tipo','$correo','$password', '$url')";
        mysqli_query($conn, $query_insert_new_user);
        // Guardar en $_SESSION el email y el id del usuario
        $find_new_user = 'SELECT id_users FROM users ORDER BY id_users DESC LIMIT 1';
        $resultado_query_newuser = mysqli_query($conn, $find_new_user);
        $usuario = mysqli_fetch_array($resultado_query_newuser);
        // Utilizar las variables globales SESSION
        $_SESSION['user_id'] = $usuario["id_users"];
        $_SESSION['correo'] = $correo;
        header("Location: principal.php");
    }
}
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="h1">Registro</h1>
            <form action="backend\upload_product.php" method="POST" enctype="multipart/form-data">
            <div class="card card-body">
                <label for ="tipo">Elige tu membresia</label>
                <select name ="tipo" id ="tipo">
                    <option value="premium">Premium</option>
                    <option value="classic">Clásico</option>
                </select>
            </div>
            <div class="form-group">
                <input name="nombre" type="text" class="form-control" placeholder="Tu nombre aquí...">
            </div>
            <div class="form-group">
                <input name="correo" type="text" class="form-control" placeholder="Tu correo aquí...">
            </div>
            <div class="form-group">
                <input name="password" type="text" class="form-control" placeholder="Tu contraseña aquí...">
            </div>
            <div class="form-group">
                <input type="file" name="img">
            </div>
            <button class="btn btn-success" name="register">
                Registrarse
            </button>
        </form>
        </br>
        </div>
    </div>
</div>

