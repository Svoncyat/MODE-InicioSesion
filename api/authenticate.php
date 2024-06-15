<?php
session_start();

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

if ($_SESSION['attempts'] >= 3 && time() - $_SESSION['block'] < 30) {
    header("Location: index.php?error=1");
    exit;
}

require_once 'database.php';

$conexion = cadenaConexionBD::ConexionBD();
if ($conexion) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $model = new logicaLogeo($conexion, $usuario, $contrasena);

    $rowController = $model->inicioSesion();

    if ($rowController) {
        $_SESSION['username'] = $usuario;
        $_SESSION['attempts'] = 0;
        header("Location: welcome.php");
    } else {
        $_SESSION['attempts'] += 1;
        if ($_SESSION['attempts'] >= 3) {
            $_SESSION['block'] = time();
        }
        header("Location: index.php?error=1");
        exit;
    }
} else {
    echo "Error al conectar con la base de datos";
    exit;
}
?>
