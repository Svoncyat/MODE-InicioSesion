<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODE-Tarea</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Inicio de Sesión</h1>
    <?php if (isset($_GET['error'])): ?>
        <p class="error-message">Usuario o contraseña incorrectos</p>
    <?php endif; ?>
    <?php if (isset($_SESSION['block']) && time() - $_SESSION['block'] < 30): ?>
        <p class="error-message">Demasiados intentos fallidos. Inténtelo de nuevo en <span id="timer">30</span> segundos.</p>
        <script>
            let countdown = 30 - (Math.floor(Date.now() / 1000) - <?php echo $_SESSION['block']; ?>);
            const timerElement = document.getElementById('timer');
            const interval = setInterval(() => {
                countdown--;
                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = 'index.php';
                } else {
                    timerElement.textContent = countdown;
                }
            }, 1000);
        </script>
    <?php else: ?>
        <form action="authenticate.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" placeholder="Ingrese su usuario" required class="<?php echo isset($_GET['error']) ? 'error' : ''; ?>"><br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" placeholder="Ingrese su contraseña" required class="<?php echo isset($_GET['error']) ? 'error' : ''; ?>"><br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    <?php endif; ?>
</body>

</html>
