<?php
require('fpdf/fpdf.php');
include('../php/verificarSesion.php');


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

//descripcion sobre mi
$sobreMi = "Técnico en Programación con experiencia y habilidades en la dirección y coordinación de equipos de trabajo orientados a proyectos tecnológicos. Enfocado principalmente en garantizar que los objetivos se cumplan de manera eficiente y colaborativa, integrando las mejores prácticas en cada fase del desarrollo. ";

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
$pdf->MultiCell(60, 5, convertirTexto($sobreMi), 0);

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
$pdf->MultiCell(60, 5, convertirTexto($sobreMi), 0);


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
$pdf->Cell(0, 5, convertirTexto('12342246-445029'), 0, 1); // Texto al lado de la imagen

$pdf->Image('../imagenes/email.png', 118, $yImagenes + $espaciado, $anchoImagen); // Email
$pdf->SetXY($xTexto, $yImagenes + $espaciado);
$pdf->Cell(0, 5, convertirTexto('strixer1605@gmail.com'), 0, 1); // Texto al lado de la imagen

$pdf->Image('../imagenes/ubicacion.png', 118, $yImagenes + ($espaciado * 2), $anchoImagen); // Ubicación
$pdf->SetXY($xTexto, $yImagenes + ($espaciado * 2));
$pdf->Cell(0, 5, convertirTexto('Mar del tuyu, Buenos Aires'), 0, 1); // Texto al lado de la imagen

$pdf->Image('../imagenes/linkedin.png', 118, $yImagenes + ($espaciado * 3), $anchoImagen); // LinkedIn
$pdf->SetXY($xTexto, $yImagenes + ($espaciado * 3));
$pdf->Cell(0, 5, convertirTexto('linkedin.com/in/felipe-maldonado'), 0, 1); // Texto al lado de la imagen


// CONTENIDO PRINCIPAL
// EXPERIENCIA LABORAL


$pdf->SetXY(20, 78);
puntoTitulos();

$pdf->SetXY(23, 78);

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->Cell(0, 10, 'EXPERIENCIA LABORAL', 0, 1);

$pdf->SetFont('NunitoSansB', 'B', 12);
asignarX();
$pdf->Cell(0, 6, convertirTexto('CASA COLOMBIA'), 0, 1); // Nombre con mb_convert_encoding

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 10, convertirTexto('2021'), 0, 1); // Año con mb_convert_encoding

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 2, convertirTexto('Vendedor, Atención al Cliente'), 0, 1); // Descripción con mb_convert_encoding

$pdf->Ln(5);

$pdf->SetFont('NunitoSansB', 'B', 12);
asignarX();
$pdf->Cell(0, 6, convertirTexto('CASA COLOMBIA'), 0, 1); // Nombre con mb_convert_encoding

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 10, convertirTexto('2021'), 0, 1); // Año con mb_convert_encoding

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 2, convertirTexto('Vendedor, Atención al Cliente'), 0, 1); // Descripción con mb_convert_encoding


$pdf->Ln(7);
//ESTUDIOS
$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetX(20);
puntoTitulos();
$pdf->SetX(23);
$pdf->Cell(0, 10, convertirTexto('ESTUDIOS'), 0, 1);

$pdf->SetFont('NunitoSansB', 'B', 12);
asignarX();
$pdf->Cell(0, 6, convertirTexto('UNIVERSIDAD BORCELLE'), 0, 1);
asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 10, convertirTexto('2021 - Actualidad.'), 0, 1);
asignarX();
$pdf->Cell(0, 2, convertirTexto('Carrera de Administración de Empresas.'), 0, 1);

$pdf->Ln(5);

$pdf->SetFont('NunitoSansB', 'B', 12);
asignarX();
$pdf->Cell(0, 6, convertirTexto('UNIVERSIDAD BORCELLE'), 0, 1);
asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 10, convertirTexto('2021 - Actualidad.'), 0, 1);
asignarX();
$pdf->Cell(0, 2, convertirTexto('Carrera de Administración de Empresas.'), 0, 1);

//IDIOMA

$pdf->Ln(7);

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetX(20);
puntoTitulos();
$pdf->SetX(23);
$pdf->Cell(0, 10, convertirTexto('IDIOMA'), 0, 1);

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 10, convertirTexto('ESPAÑOL (NATIVO)'), 0, 1);
asignarX();
$pdf->Cell(0, 6, convertirTexto('INGLES'), 0, 1);

//HERRAMIENTAS DE SOFTWARE

$pdf->Ln(7);

$pdf->SetFont('NunitoSansR', '', 12);
$pdf->SetX(20);
puntoTitulos();
$pdf->SetX(23);
$pdf->Cell(0, 10, convertirTexto('HERRAMIENTAS DE SOFTWARE'), 0, 1);

$pdf->Ln(3);

asignarX();
$pdf->SetFont('NunitoSansL', '', 10);
$pdf->Cell(0, 6, convertirTexto('CANVAS'), 0, 1);
asignarX();
$pdf->Cell(0, 6, convertirTexto('PHP'), 0, 1);
asignarX();
$pdf->Cell(0, 6, convertirTexto('JAVASCRIPT'), 0, 1);
asignarX();
$pdf->Cell(0, 6, convertirTexto('EXCEL'), 0, 1);

// Salida
$pdf->Output();
?>
