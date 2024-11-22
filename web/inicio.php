<?php
    include('../php/verificarSesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/stylesInicio.css">
    <link rel="stylesheet" href="../styles/stylesNav.css">
</head>
<body>
    <div class="container">
    <!-- Menú para escritorio -->
    <a href="inicio.php">
        <img style="margin-top: 8px; height: 70px; cursor: pointer;" src="../imagenes/ley.png" alt="Inicio">
    </a>
    <!-- Navegación -->
    <nav  id="escritorio">
        <a href="sobreMi.php">Sobre mí</a>
        <a href="trabajos.php">Trabajos</a>
        <a href="#resume" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px; color: #3C998F;" id="curriculumEscritorio">Currículum</a>
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
                            <li><a href="trabajos.php">Trabajos</a></li>
                            <li><a href="#resume" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px;">Curriculum</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    
        <div id="wrapper">
            <div class="main-content">
                <div class="text-content">
                    <p style="color: #3C998F;">Hola, mi nombre es</p>
                    <h1>Felipe Jacob Maldonado.</h1>
                    <h2>I build things for the web.</h2>
                    <p>
                        I'm a software engineer specializing in building (and occasionally designing) exceptional digital experiences.
                        Currently, I'm focused on building accessible, human-centered products.
                    </p>
                    <a href="#work">Revisa mis proyectos!</a>
                </div>
                <div class="image-content">
                    <div class="image-wrapper">
                        <img src="../imagenes//fotoYo.png" alt="Imagen recortada">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>