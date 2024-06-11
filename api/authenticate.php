<?php
require_once 'database.php';

$conexion = cadenaConexionBD::ConexionBD();
if ($conexion) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $model = new logicaLogeo($conexion, $usuario, $contrasena);

    $rowController = $model->inicioSesion();

    if ($rowController) {
        echo "Inicio de sesión exitoso";
        
    } else {
        echo "Usuario o contraseña incorrectos";

        header("refresh:2; url=http://jsteven/MODE-Sesion/");
        exit;
    }
} else {
    echo "Error al conectar con la base de datos";
    exit;
}
?>
