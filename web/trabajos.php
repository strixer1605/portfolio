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
    <a href="inicio.php">
        <img style="margin-top: 8px; margin-left: 100px; height: 70px; cursor: pointer;" src="../imagenes/ley.png" alt="Inicio">
    </a>
    <nav id="escritorio">
        <a href="sobreMi.php">Sobre mi</a>
        <a href="trabajos.php">Proyectos</a>
        <a href="#resume" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px; color: #3C998F;" id="curriculumEscritorio">Curriculum</a>
    </nav>

    <div class="social-container">
        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/in/tuusuario" target="_blank" class="social-item">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <!-- Email -->
        <a href="mailto:tuemail@gmail.com" class="social-item">
            <i class="fas fa-envelope"></i>
        </a>
        <!-- WhatsApp -->
        <a href="https://wa.me/1234567890" target="_blank" class="social-item">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Menú para móviles -->
    <nav class="navbar bg-body-tertiary fixed-top navbar-mobile">
        <div class="container-fluid" style="justify-content: flex-end;">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li><a href="sobreMi.php">Sobre mi</a></li>
                        <li><a href="trabajos.php">Proyectos</a></li>
                        <li><a href="#resume" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px;">Curriculum</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <header>
        <h1>Mis Proyectos</h1>
        <p>Esta es una lista de repositorios destacados de GitHub junto con una breve descripción de cada uno.</p>
    </header>

    <main id="repos-container">
        <!-- Los repositorios se cargarán aquí -->
    </main>

    <footer>
        <p>Creado por <a href="https://github.com/TuUsuario" target="_blank">Felpie Jacob Maldonado</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts//scriptTrabajos.js"></script> <!-- Archivo JS externo -->
</body>
</html>
