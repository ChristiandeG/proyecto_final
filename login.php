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
    header("Location: principal.php");
}
if (isset($_POST['login'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE correo = '$correo' AND password = '$password'";
    $resultado_user = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado_user) >= 1) {
        // Guardar sus valores en $_SESSION
        $usuario =  mysqli_fetch_array($resultado_user);
        $_SESSION["user_id"] = $usuario["id_users"];
        $_SESSION["mail"] = $usuario["correo"];
        echo "Usuario correcto";
        header("Location: principal.php");
    } else {
        // Crear usuario en la base de datos
        echo "Usuario incorrecto";
    }
}
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="h1">Usuario</h1>
            <div class="card card-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input name="correo" type="text" class="form-control" placeholder="Tu correo aquí...">
                    </div>
                    <div class="form-group">
                        <input name="password" type="text" class="form-control" placeholder="Tu contraseña aquí...">
                    </div>
                    <button class="btn btn-success" name="login">
                        Entrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>