<?php
require('fpdf/fpdf.php');
include('../php/verificarSesion.php');

// Incluir la conexión a la base de datos
include '../php/conexion.php';

// Consultar datos de contacto y sobre_mi en una sola consulta
$sql_contacto_sobre_mi = "SELECT c.telefono, c.email, c.ubicacion, c.linkedin, s.descripcion 
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
    $descripcion = $row['descripcion'];
} else {
    echo "No se encontraron datos para contacto y sobre mí.";
}

// Consultar los estudios
$sql_estudios = "SELECT institucion, periodo, titulo FROM estudios";
$resultado_estudios = mysqli_query($conexion, $sql_estudios);
$estudios = [];
if ($resultado_estudios && mysqli_num_rows($resultado_estudios) > 0) {
    while ($row = mysqli_fetch_assoc($resultado_estudios)) {
        $estudios[] = $row; // Guardar cada estudio en el array $estudios
    }
}

// Consultar la experiencia laboral
$sql_experiencia_laboral = "SELECT lugar, periodo, puesto FROM experiencia_laboral";
$resultado_experiencia_laboral = mysqli_query($conexion, $sql_experiencia_laboral);
$experiencia_laboral = [];
if ($resultado_experiencia_laboral && mysqli_num_rows($resultado_experiencia_laboral) > 0) {
    while ($row = mysqli_fetch_assoc($resultado_experiencia_laboral)) {
        $experiencia_laboral[] = $row; // Guardar cada experiencia laboral en el array $experiencia_laboral
    }
}

// Consultar las herramientas de software
$sql_herramientas = "SELECT herramienta FROM herramientas_software";
$resultado_herramientas = mysqli_query($conexion, $sql_herramientas);
$herramientas = [];
if ($resultado_herramientas && mysqli_num_rows($resultado_herramientas) > 0) {
    while ($row = mysqli_fetch_assoc($resultado_herramientas)) {
        $herramientas[] = $row['herramienta']; // Guardar cada herramienta en el array $herramientas
    }
}

// Consultar los idiomas
$sql_idiomas = "SELECT idioma FROM idiomas";
$resultado_idiomas = mysqli_query($conexion, $sql_idiomas);
$idiomas = [];
if ($resultado_idiomas && mysqli_num_rows($resultado_idiomas) > 0) {
    while ($row = mysqli_fetch_assoc($resultado_idiomas)) {
        $idiomas[] = $row['idioma']; // Guardar cada idioma en el array $idiomas
    }
}

// Cerrar la conexión
mysqli_close($conexion);

// A partir de aquí, puedes usar las variables: $telefono, $email, $ubicacion, $linkedin, $descripcion, 
// $estudios (array), $experiencia_laboral (array), $herramientas (array), $idiomas (array)



// Inicializar PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('NunitoSansR', '', 'nunito-sans.regular.php');
$pdf->AddFont('NunitoSansL', '', 'nunito-sans.extralight.php');
$pdf->AddFont('NunitoSansB', 'B', 'nunito-sans.bold.php');

// Función para convertir y devolver el texto en ISO-8859-1
function convertirTexto($texto) {
    return mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8');
}

function puntoTitulos(){
    global $pdf; // Hacer que $pdf sea accesible dentro de la función
    // Guardar las coordenadas actuales de X y Y
    $x = $pdf->GetX();  // Obtener la posición X actual
    $y = $pdf->GetY();  // Obtener la posición Y actual
    
    // Modificar las coordenadas: restar 4 a X y sumar 3 a Y
    $new_x = $x - 4;
    $new_y = $y + 3.3;

    // Usar las nuevas coordenadas en el método Image
    $pdf->Image('../imagenes/punto.png', $new_x, $new_y, 3); // Imagen en nuevas coordenadas
}

function asignarX(){
    global $pdf; // Hacer que $pdf sea accesible dentro de la función
    $pdf->setX(15);
}

// Imagen del perfil
$pdf->Image('../imagenes/fotoYoCV.png', 10, 15, 50); // Imagen arriba a la izquierda (ajusta el tamaño y posición)

// Configuración del texto (nombre y área)
$pdf->SetXY(65, 30); // Posición inicial
$pdf->SetFont('NunitoSansB', 'B', 27); // Fuente negrita para el nombre
$pdf->MultiCell(0, 10, "FELIPE JACOB MALDONADO\n", 0); // Nombre con un salto de línea

$pdf->SetXY(65, 40); // Posición inicial
$pdf->SetFont('NunitoSansL', '', 12); // Fuente más pequeña para el área
$pdf->MultiCell(0, 10, convertirTexto('Desarrollador web y apasionado por la tecnología.')); // Descripción del área

// Línea divisoria
$pdf->SetLineWidth(1);
$pdf->SetDrawColor(0, 0, 0); // Color negro
$pdf->Line(10, 70, 200, 70);

// SOBRE MÍ (Bloque lateral)
// Establecer color de relleno para el rectángulo
$pdf->SetFillColor(84, 84, 84); // Gris claro

// Guardar la posición Y actual antes de agregar el texto
$y_inicio = 100;


// Calcular el alto máximo del rectángulo (esto puede variar dependiendo del texto)
// Usaremos MultiCell para obtener la altura dinámica
$pdf->SetXY(128, $y_inicio);
$pdf->SetFont('NunitoSansB', 'B', 14);
$pdf->Cell(0, 10, convertirTexto('SOBRE MÍ'), 0, 1);

// Cambiar la posición Y para el texto descriptivo
$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetXY(128, $y_inicio + 17); // Ajuste vertical para el texto

$pdf->SetLineWidth(1);
$pdf->SetDrawColor(220, 220, 220); // Color negro
$pdf->Line(130, 112, 137, 112);

// Insertar el texto descriptivo usando MultiCell para manejar texto largo
$pdf->MultiCell(60, 5, convertirTexto($descripcion), 0);

// Obtener la nueva posición Y después de insertar el texto
$y_final = $pdf->GetY();

// Calcular la altura total del rectángulo según el contenido del texto
$alto_rectangulo = $y_final - $y_inicio; // Calcula la altura dinámica

// Redibujar el rectángulo con la altura ajustada (antes de agregar el texto)
$pdf->Rect(118, 93, 80, $alto_rectangulo + 15.7, 'F'); // Dibujar rectángulo con altura dinámica

$y_inicio = 100;

// Calcular el alto máximo del rectángulo (esto puede variar dependiendo del texto)
// Usaremos MultiCell para obtener la altura dinámica
$pdf->SetTextColor(255, 255, 255); // Texto en color negro
$pdf->SetXY(128, $y_inicio);
$pdf->SetFont('NunitoSansB', 'B', 14);
$pdf->Cell(0, 10, convertirTexto('SOBRE MÍ'), 0, 1);

$pdf->SetLineWidth(1);
$pdf->SetDrawColor(220, 220, 220); // Color negro
$pdf->Line(130, 112, 137, 112);

// Cambiar la posición Y para el texto descriptivo
$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetXY(128, $y_inicio + 17); // Ajuste vertical para el texto


// Insertar el texto descriptivo usando MultiCell para manejar texto largo
$pdf->MultiCell(60, 5, convertirTexto($descripcion), 0);


// Obtener la posición Y después del texto
$yContacto = $pdf->GetY(); // Obtener el valor actual de Y

// CONTACTO
// Fondo negro con texto blanco
$pdf->SetFillColor(0, 0, 0); // Fondo negro
$pdf->SetTextColor(255, 255, 255); // Texto blanco

$yCuadroContacto = $yContacto + 30;
// Crear rectángulo
$pdf->Rect(118, $yCuadroContacto, 80, 20, 'F'); // Rectángulo en (118, 200) con 80 de ancho y 20 de alto

// Fuente
$pdf->SetFont('NunitoSansB', 'B', 25);

// Calcular la posición X para centrar el texto
$texto = 'CONTACTO'; // El texto a centrar
$ancho_texto = $pdf->GetStringWidth($texto); // Ancho del texto
$x = 118 + (80 - $ancho_texto) / 2; // Posición X centrada en el rectángulo

// Calcular la posición Y para centrar verticalmente
$y = $yCuadroContacto + (20) / 4; // Ajustamos la posición Y para que el texto quede centrado verticalmente

// Colocar el texto centrado dentro del rectángulo
$pdf->SetXY($x, $y);
$pdf->Cell(0, 10, $texto, 0, 1);

// Obtener la posición Y donde termina el rectángulo
$yFinalContacto = $yCuadroContacto + 20; // $yCuadroContacto es la posición inicial Y del rectángulo, y 20 es su altura

// Ajustar la posición inicial para las imágenes
$yImagenes = $yFinalContacto + 10; // Agregar un pequeño margen de separación

// Espaciado entre las imágenes
$espaciado = 12; // Separación vertical entre cada imagen

// Ancho de las imágenes
$anchoImagen = 5; 

// Posición X para el texto al lado de la imagen
$xTexto = 118 + $anchoImagen + 5; // La posición X del texto es la posición de la imagen más su ancho y un margen extra

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetTextColor(0, 0, 0);
// Dibujar las imágenes y texto una debajo de la otra
$pdf->Image('../imagenes/telefono.png', 118, $yImagenes, $anchoImagen); // Teléfono
$pdf->SetXY($xTexto, $yImagenes);
$pdf->Cell(0, 5, convertirTexto($telefono), 0, 1); // Texto al lado de la imagen

$pdf->Image('../imagenes/email.png', 118, $yImagenes + $espaciado, $anchoImagen); // Email
$pdf->SetXY($xTexto, $yImagenes + $espaciado);
$pdf->Cell(0, 5, convertirTexto($email), 0, 1); // Texto al lado de la imagen

$pdf->Image('../imagenes/ubicacion.png', 118, $yImagenes + ($espaciado * 2), $anchoImagen); // Ubicación
$pdf->SetXY($xTexto, $yImagenes + ($espaciado * 2));
$pdf->Cell(0, 5, convertirTexto($ubicacion), 0, 1); // Texto al lado de la imagen

$textoLinkedIn = "Ver perfil en LinkedIn";  // El texto que quieres mostrar

// Imagen de LinkedIn
$pdf->Image('../imagenes/linkedin.png', 118, $yImagenes + ($espaciado * 3), $anchoImagen);

// Texto al lado de la imagen
$pdf->SetXY($xTexto, $yImagenes + ($espaciado * 3));
$pdf->Cell(0, 5, convertirTexto($textoLinkedIn), 0, 1, '', false, $linkedin); // Enlace clickeable


// CONTENIDO PRINCIPAL
// EXPERIENCIA LABORAL


$pdf->SetXY(20, 78);
puntoTitulos();

$pdf->SetXY(23, 78);

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->Cell(0, 10, 'EXPERIENCIA LABORAL', 0, 1);

// Bucle para recorrer los datos de la experiencia laboral
foreach ($experiencia_laboral as $experiencia) {
    // Establecer la fuente para el nombre de la empresa
    $pdf->SetFont('NunitoSansB', 'B', 12);
    asignarX();
    $pdf->Cell(0, 6, convertirTexto($experiencia['lugar']), 0, 1); // Nombre de la empresa

    // Establecer la fuente para el periodo de trabajo
    asignarX();
    $pdf->SetFont('NunitoSansL', '', 10);
    $pdf->Cell(0, 10, convertirTexto($experiencia['periodo']), 0, 1); // Año o periodo de trabajo

    // Establecer la fuente para el puesto
    asignarX();
    $pdf->SetFont('NunitoSansL', '', 10);
    $pdf->Cell(0, 2, convertirTexto($experiencia['puesto']), 0, 1); // Descripción del puesto

    // Añadir un salto de línea entre experiencias
    $pdf->Ln(5);
}

$pdf->Ln(2);
//ESTUDIOS
$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetX(20);
puntoTitulos();
$pdf->SetX(23);
$pdf->Cell(0, 10, convertirTexto('ESTUDIOS'), 0, 1);

// Bucle para recorrer los datos de los estudios
foreach ($estudios as $estudio) {
    // Establecer la fuente para la institución
    $pdf->SetFont('NunitoSansB', 'B', 12);
    asignarX();
    $pdf->Cell(0, 6, convertirTexto($estudio['institucion']), 0, 1); // Nombre de la institución

    // Establecer la fuente para el periodo de estudio
    asignarX();
    $pdf->SetFont('NunitoSansL', '', 10);
    $pdf->Cell(0, 10, convertirTexto($estudio['periodo']), 0, 1); // Periodo de estudio

    // Establecer la fuente para el título de la carrera
    asignarX();
    $pdf->Cell(0, 2, convertirTexto($estudio['titulo']), 0, 1); // Título de la carrera

    // Añadir un salto de línea entre estudios
    $pdf->Ln(5);
}


//IDIOMA

$pdf->Ln(2);

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetX(20);
puntoTitulos();
$pdf->SetX(23);
$pdf->Cell(0, 10, convertirTexto('IDIOMA'), 0, 1);

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 10, convertirTexto('ESPAÑOL (NATIVO)'), 0, 1);

// Bucle para recorrer los datos de los idiomas
foreach ($idiomas as $idioma) {
    // Ejecutar el código para cada idioma
    asignarX();
    $pdf->SetFont('NunitoSansL', '', 10);
    $pdf->Cell(0, 6, convertirTexto($idioma), 0, 1);
}

//HERRAMIENTAS DE SOFTWARE

$pdf->Ln(2);

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetX(20);
puntoTitulos();
$pdf->SetX(23);
$pdf->Cell(0, 10, convertirTexto('HERRAMIENTAS DE SOFTWARE'), 0, 1);

$pdf->Ln(3);

foreach ($herramientas as $herramienta) {
    // Ejecutar el código para cada herramienta
    asignarX();
    $pdf->SetFont('NunitoSansL', '', 10);
    $pdf->Cell(0, 6, convertirTexto($herramienta), 0, 1); // Asumiendo que cada elemento de $herramientas[] es el nombre de la herramienta
}

// Salida
$pdf->Output();
?>
