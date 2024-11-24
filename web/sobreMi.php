<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Mí</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/stylesSobreMi.css">
    <link rel="stylesheet" href="../styles/stylesNav.css">
</head>
<body>
    <div class="container">

        <?php include '../php/navbar.php' ?>
    
        <!-- Sección: Quién soy -->
        <div class="section" style="margin-top: 40px;" id="quien-soy">
            <h1>Quién Soy</h1>
            <div class="image-content">
                <img src="../imagenes/fotoYo.png" alt="Foto personal">
            </div>
            <div class="text-content">
                <p>Soy del sur argentino, donde me crié hasta los 10 años cuando me mudé a la costa. Me apasiona documentar proyectos, diseñar encuestas y crear experiencias digitales significativas.</p>
            </div>
        </div>
    
        <!-- Sección: Formación -->
        <div class="section" id="formacion">
            <h2>Formación</h2>
            <div class="text-content">
                <p>Estudié [Nombre del Campo de Estudio] en [Nombre de la Institución], donde adquirí habilidades en desarrollo web, diseño UX/UI y gestión de proyectos.</p>
                <p>Además, he complementado mi educación con cursos en tecnologías como HTML, CSS, JavaScript y frameworks modernos.</p>
            </div>
        </div>
        
        <!-- Sección: Experiencias -->
        <div class="section" id="experiencia">
            <h2>Experiencias</h2>
            <div class="text-content">
                <p>Mis experiencias son tanto escolares como reales ya que la modalidad de la escuela a la que asistí realizamos prácticas profesionalisantes.</p>
                <p>Donde llevé a cabo distintos proyectos que hoy en dia estan en funcionamiente.</p>
            </div>
        </div>
    
        <!-- Sección: Cómo Trabajo -->
        <div class="section" id="como-trabajo">
            <h2>Cómo Trabajo</h2>
            <div class="text-content">
                <p>Me gusta abordar los proyectos de manera estructurada, comenzando con la planificación, documentación y análisis de los requisitos. Trabajo en colaboración con equipos multidisciplinarios para garantizar resultados alineados con los objetivos.</p>
                <p>Siempre priorizo la comunicación clara y el diseño centrado en las personas para ofrecer soluciones efectivas.</p>
            </div>
        </div>
    
        <!-- Sección: Áreas de Trabajo -->
        <div class="section" id="area-trabajo">
            <h2>Áreas de Trabajo</h2>
            <div class="text-content">
                <p>Mis áreas principales incluyen:</p>
                <ul style="list-style-type: none; padding: 0;">
                    <li>📱 Desarrollo web responsivo.</li>
                    <li>🎨 Diseño UX/UI.</li>
                    <li>🛠️ Documentación técnica y análisis.</li>
                    <li>📊 Gestión y planificación de proyectos.</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
