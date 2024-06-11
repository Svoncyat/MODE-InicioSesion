<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODE-Tarea</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a><?php
        include_once("database.php");
        cadenaConexionBD::ConexionBD();
        ?></a>
    <h1>Inicio de Sesión</h1>
    <form action="authenticate.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" placeholder="Ingrese su usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" placeholder="Ingrese su contraseña" required><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>

</html>