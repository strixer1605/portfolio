<?php
    session_start();
    // Verificar si hay una sesión activa
    if (isset($_SESSION['email']) || isset($_SESSION['nombre'])) {
        // Destruir la sesión
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="wrapper">
        <div class="login-container">
            <div class="form-box">
                <h1>Bienvenido</h1>
                <form id="login-form">
                    <input type="text" id="name" placeholder="Ingrese su nombre">
                    <input type="email" id="email" placeholder="Ingrese su email">
                    <button type="button" id="login-btn">Iniciar sesión</button>
                </form>
                <div class="register-link">
                    <p>Aún no tienes una cuenta? <a href="web/register.html">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/scriptIndex.js"></script>
</body>
</html>
