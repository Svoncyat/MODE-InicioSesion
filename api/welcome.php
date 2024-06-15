<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Bienvenido,<a class="colorname"> <?php echo htmlspecialchars($_SESSION['username']); ?> </a>
    </h1>
    <h2>Has iniciado sesión correctamente</h2>
    <button class="back">
        <a href="logout.php" style="text-decoration: none; color: white;">Cerrar sesión</a>
    </button>
</body>

</html>