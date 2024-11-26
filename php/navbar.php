<?php
    include 'verificarSesion.php';
    include 'conexion.php';

    // Consultar datos de contacto y sobre_mi en una sola consulta
    $sql_contacto_sobre_mi = "SELECT c.telefono, c.email, c.ubicacion, c.linkedin
                            FROM contacto c 
                            LEFT JOIN sobre_mi s ON s.id = 1"; // Suponiendo que el ID de 'sobre_mi' que quieres obtener es el 1

    // Ejecutar la consulta
    $resultado_contacto_sobre_mi = mysqli_query($conexion, $sql_contacto_sobre_mi);

    // Verificar si la consulta fue exitosa
    if ($resultado_contacto_sobre_mi && mysqli_num_rows($resultado_contacto_sobre_mi) > 0) {
        // Guardar los resultados en variables
        $row = mysqli_fetch_assoc($resultado_contacto_sobre_mi);
        $telefono = $row['telefono'];
        $email = $row['email'];
        $ubicacion = $row['ubicacion'];
        $linkedin = $row['linkedin'];
    } else {
        echo "No se encontraron datos para contacto y sobre mí.";
    }

    // Cerrar la conexión
    mysqli_close($conexion);

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<a id="inicio" href="inicio.php">
    <img style="margin-top: 8px; height: 70px; cursor: pointer;" src="../imagenes/ley.png" alt="Inicio">
</a>

<!-- Menú para escritorio -->
<nav id="escritorio">
    <?php
    if ($hayResultado) {
        echo '
        <a href="panelDeControl.php">Panel de control</a>
        ';
    }
    ?>
    <a href="sobreMi.php">Sobre mi</a>
    <a href="trabajos.php">Trabajos</a>
    <a href="curriculum.php" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px; color: #3C998F;" id="curriculumEscritorio">Curriculum</a>
    <a href="../index.php">Cerrar sesion</a>
</nav>

<div>
    <div id="iconosEscritorio" class="social-container">
        <!-- LinkedIn -->
        <a href="<?= $linkedin ?>" target="_blank" class="social-item">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <!-- Email -->
        <a href="mailto:<?= $email ?>" class="social-item">
            <i class="fas fa-envelope"></i>
        </a>
        <!-- WhatsApp -->
        <a href="https://wa.me/<?= $telefono ?>" target="_blank" class="social-item">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
</div>



<!-- Menú para móviles -->
<nav class="navbar bg-body-tertiary fixed-top navbar-mobile">
    <div class="container-fluid" style="justify-content: flex-end;">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                <?php
                    if ($hayResultado) {
                        echo '
                        <li><a href="panelDeControl.php">Panel de control</a></li>
                        ';
                    }
                ?>
                    <li><a href="sobreMi.php">Sobre mi</a></li>
                    <li><a href="trabajos.php">Trabajos</a></li>
                    <li>
                        <a href="curriculum.php" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px;">Curriculum</a>
                    </li>
                    <li>
                        <a href="../index.php">Cerrar sesion</a>
                    </li>
                </ul>
                <!-- Redes sociales -->
                <div class="social-container" style="margin-top: 20px;">
                    <a href="<?= $linkedin ?>" target="_blank" class="social-item">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="mailto:<?= $email ?>" class="social-item">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="https://wa.me/<?= $telefono ?>" target="_blank" class="social-item">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>