<?php
include('C:\xampp\htdocs\proyecto_final\db.php');
if (isset($_FILES['img'])) {
    $img = $_FILES["img"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    // Guardar la URL en la base de datos
    $url = "http://localhost/proyecto_final/uploads/" . basename($img['name']);
    $sql = "INSERT INTO users (nombre, tipo, correo, password, url) VALUES ('$nombre','$tipo','$correo','$password', '$url')";
    $conn->query($sql);

    // Mover imagen a la carpeta uploads
    // move_uploaded_file($img['tmp_name'], "../proyecto_final/uploads".$img['name']);
    move_uploaded_file($img['tmp_name'], "../uploads/$img[name]");   
}
?>