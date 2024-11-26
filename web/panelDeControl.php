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
    <link rel="stylesheet" href="../styles//panelDeControl.css">
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
                <div class="form">
                    <!-- Formulario para agregar una nueva experiencia -->
                        <label for="empresa">Nombre de la empresa:</label>
                        <input type="text" id="empresa" name="empresa" placeholder="Ingrese el nombre de la empresa" required>
    
                        <label for="periodo">Periodo trabajado:</label>
                        <input type="text" id="periodo" name="periodo" placeholder="Especifique el periodo que trabajó" required>
    
                        <label for="rol">Rol:</label>
                        <input type="text" id="rol" name="rol" placeholder="¿Cuál fue su rol?" required>
    
                        <button type="submit" id="agregarExperiencia">Guardar</button>
    
                    <!-- Botón para desplegar/ocultar las experiencias laborales -->
                    <button id="toggleExperiencias" class="nav-button" style="margin-left: 0; margin-right: 0;">Mostrar Experiencias</button>
                </div>

                <!-- Contenedor de las experiencias -->
                <div id="listaExperiencias" class="experiencias-contenedor" style="display: none;">
                    <?php
                        include '../php/traeExperiencia.php';
                    ?>
                </div>
            </section>

            <section id="estudios">
                <h2>Estudios</h2>
                <div class="form">
                    <!-- Formulario para agregar un nuevo estudio -->
                    <label for="institucion">Institución:</label>
                    <input type="text" id="institucion" name="institucion" placeholder="Ingrese el nombre de la institución" required>

                    <label for="periodoEstudio">Periodo de estudio:</label>
                    <input type="text" id="periodoEstudio" name="periodoEstudio" placeholder="Especifique el periodo de estudio" required>

                    <label for="titulo">Título obtenido:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="¿Qué título obtuvo?" required>

                    <button type="submit" id="agregarEstudio">Guardar</button>

                    <!-- Botón para desplegar/ocultar los estudios -->
                    <button id="toggleEstudios" class="nav-button" style="margin-left: 0; margin-right: 0;">Mostrar Estudios</button>
                </div>

                <!-- Contenedor de los estudios -->
                <div id="listaEstudios" class="estudios-contenedor" style="display: none;">
                    <?php
                        include '../php/traerEstudios.php';
                    ?>
                </div>
            </section>

    
            <section id="idiomas">
                <h2>Idiomas</h2>
                <div class="form">
                    <label for="idioma">Agregar idioma:</label>
                    <input type="text" id="idioma" name="idioma">
                    <button type="submit" id="guardarIdioma">Guardar</button>

                    <!-- Botón para desplegar/ocultar la lista de idiomas -->
                    <button type="button" id="toggleIdiomas" class="nav-button" style="margin-left: 0; margin-right: 0;">Mostrar Idiomas</button>
                </div>

                <!-- Contenedor de los idiomas -->
                <div id="listaIdiomas" class="idiomas-contenedor" style="display: none;justify-content: center;flex-direction: column;align-items: center;">
                    <?php
                        include '../php/traerIdiomas.php';
                    ?>
                </div>
            </section>
    
            <section id="herramientas">
                <h2>Herramientas de Software</h2>
                <div class="form">
                    <label for="herramienta">Agregar herramienta:</label>
                    <input type="text" id="herramienta" name="herramienta">
                    <button type="submit" id="guardarHerramienta">Guardar</button>

                    <!-- Botón para desplegar/ocultar la lista de herramientas -->
                    <button type="button" id="toggleHerramientas" class="nav-button" style="margin-left: 0; margin-right: 0;">Mostrar Herramientas</button>
                </div>

                <!-- Contenedor de las herramientas -->
                <div id="listaHerramientas" class="herramientas-contenedor" style="display: none; justify-content: center; flex-direction: column; align-items: center;">
                    <?php
                        include '../php/traerHerramientas.php';
                    ?>
                </div>
            </section>
    
            <section id="contacto">
                <h2>Contacto</h2>
                <div class="form">
                    <?php
                        include '../php/traerContacto.php';
                    ?>

                    <button type="button" id="btnContacto">Guardar</button>
                </div>
            </section>

    
            <section id="sobre-mi">
                <h2>Sobre Mí</h2>
                <div class="form">
                    <label for="descripcion">Descripción:</label>
                    <?php
                        include '../php/traerSobreMi.php';
                    ?>
                    <button type="button" id="sobreMi">Guardar</button>
                </div>
            </section>
        </main>
    </div>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../scripts//panelControl.js"></script>
</body>
</html>
