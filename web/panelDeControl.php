<?php
    include '../php/verificarSesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Currículum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles//stylesNav.css">
    <link rel="stylesheet" href="../styles//panelDeContro.css">
</head>
<body>
    <div class="container">

        <?php
            include '../php/navbar.php';
        ?>
        <header class="header">
            <h1>Editar Currículum</h1>
            <p>Selecciona una sección para modificar:</p>
        </header>
    
        <div class="navigation">
            <button class="nav-button" onclick="scrollToSection('experiencias')">Experiencias Laborales</button>
            <button class="nav-button" onclick="scrollToSection('estudios')">Estudios</button>
            <button class="nav-button" onclick="scrollToSection('idiomas')">Idiomas</button>
            <button class="nav-button" onclick="scrollToSection('herramientas')">Herramientas de Software</button>
            <button class="nav-button" onclick="scrollToSection('contacto')">Contacto</button>
            <button class="nav-button" onclick="scrollToSection('sobre-mi')">Sobre Mí</button>
        </div>
    
        <main class="content">
            <section id="experiencias">
                <h2>Experiencias Laborales</h2>
                <form>
                    <label for="experiencia">Agregar experiencia:</label>
                    <textarea id="experiencia" name="experiencia" rows="4"></textarea>
                    <button type="submit">Guardar</button>
                </form>
            </section>
    
            <section id="estudios">
                <h2>Estudios</h2>
                <form>
                    <label for="estudio">Agregar estudio:</label>
                    <textarea id="estudio" name="estudio" rows="4"></textarea>
                    <button type="submit">Guardar</button>
                </form>
            </section>
    
            <section id="idiomas">
                <h2>Idiomas</h2>
                <form>
                    <label for="idioma">Agregar idioma:</label>
                    <input type="text" id="idioma" name="idioma">
                    <button type="submit">Guardar</button>
                </form>
            </section>
    
            <section id="herramientas">
                <h2>Herramientas de Software</h2>
                <form>
                    <label for="herramienta">Agregar herramienta:</label>
                    <input type="text" id="herramienta" name="herramienta">
                    <button type="submit">Guardar</button>
                </form>
            </section>
    
            <section id="contacto">
                <h2>Contacto</h2>
                <form>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <button type="submit">Guardar</button>
                </form>
            </section>
    
            <section id="sobre-mi">
                <h2>Sobre Mí</h2>
                <form>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4"></textarea>
                    <button type="submit">Guardar</button>
                </form>
            </section>
        </main>
    </div>

    <script>
        // Función para navegar entre secciones
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
