<?php
    include('../php/verificarSesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Repositorios</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles//stylesTrabajos.css"> <!-- Archivo CSS externo -->
    <link rel="stylesheet" href="../styles//stylesNav.css"> <!-- Archivo CSS externo -->
</head>
<body>
    <div class="container">

        <?php include '../php/navbar.php' ?>

        <header>
            <h1>Mis Proyectos</h1>
            <p>Esta es una lista de repositorios destacados de GitHub junto con una breve descripción de cada uno.</p>
        </header>
    
        <main id="repos-container">
            <!-- Los repositorios se cargarán aquí -->
        </main>
    </div>

    <footer>
        <p>Creado por <a href="https://github.com/TuUsuario" target="_blank">Felpie Jacob Maldonado</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts//scriptTrabajos.js"></script> <!-- Archivo JS externo -->
</body>
</html>
