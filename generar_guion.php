<?php
require_once "app/pdf/fpdf.php";

class GuionPDF extends FPDF {
    // Cabecera de página
    function Header() {
        if (file_exists('app/views/img/logo.png')) {
            $this->Image('app/views/img/logo.png', 10, 8, 15);
        }
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(249, 115, 22); // Color Naranja FerreMar
        $this->Cell(20);
        $this->Cell(0, 10, utf8_decode('FerreMar - Guion Oficial de Video Demostrativo'), 0, 1, 'L');
        $this->SetFont('Arial', 'I', 8.5);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(20);
        $this->Cell(0, 5, utf8_decode('Guía técnica de grabación y libreto de voz paso a paso'), 0, 1, 'L');
        $this->Ln(8);
        $this->Line(10, 28, 200, 28);
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->Line(10, 282, 200, 282);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(150, 150, 150);
        $this->Cell(0, 10, utf8_decode('FerreMar © ' . date('Y') . ' | Guía de Presentación del Sistema'), 0, 0, 'L');
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

// Creación del objeto PDF
$pdf = new GuionPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(15, 32, 15);
$pdf->SetAutoPageBreak(true, 20);

// Título Principal
$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetTextColor(30, 41, 59); // Slate Oscuro
$pdf->Cell(0, 8, utf8_decode('GUION DE PRESENTACIÓN EN VIDEO - FERREMAR'), 0, 1, 'C');
$pdf->Ln(2);

// Recomendaciones Técnicas
$pdf->SetFillColor(254, 243, 199); // Fondo amarillo muy suave
$pdf->SetDrawColor(253, 230, 138); // Borde amarillo
$pdf->Rect(15, 42, 180, 36, 'DF');

$pdf->SetY(44);
$pdf->SetFont('Arial', 'B', 9.5);
$pdf->SetTextColor(146, 64, 14); // Texto café/naranja oscuro
$pdf->Cell(0, 5, utf8_decode('RECOMENDACIONES TÉCNICAS ANTES DE GRABAR:'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 8.5);
$pdf->SetTextColor(50, 50, 50);
$pdf->MultiCell(175, 4.5, utf8_decode(
    "- Usa un grabador de pantalla a 1080p (Full HD) como OBS Studio o ShareX.\n" .
    "- Asegúrate de grabar con micrófono en un espacio completamente silencioso.\n" .
    "- Borra la caché de tu navegador antes de iniciar presionando Ctrl + F5.\n" .
    "- Ten la sesión lista con el usuario Administrador1 (clave: 123456) para fluidez."
), 0, 'L');

$pdf->Ln(12);

// Función para renderizar una escena
function renderEscena($pdf, $numero, $titulo, $tiempo, $mostrar, $narrar) {
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(249, 115, 22); // Naranja
    $pdf->Cell(0, 6, utf8_decode("ESCENA $numero: $titulo"), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(100, 100, 100);
    $pdf->Cell(0, 6, utf8_decode("Tiempos: $tiempo"), 0, 1, 'R');
    $pdf->Ln(1);

    // Caja para "Lo que debes mostrar"
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(30, 41, 59);
    $pdf->Cell(0, 5, utf8_decode("🖥️ Lo que debes mostrar en pantalla y acciones:"), 0, 1, 'L');
    $pdf->SetFont('Arial', '', 8.5);
    $pdf->SetTextColor(60, 60, 60);
    $pdf->MultiCell(0, 4.5, utf8_decode($mostrar), 0, 'L');
    $pdf->Ln(1.5);

    // Caja para "Lo que debes narrar"
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(30, 41, 59);
    $pdf->Cell(0, 5, utf8_decode("🗣️ Lo que debes narrar (Voz en off):"), 0, 1, 'L');
    $pdf->SetFont('Arial', 'I', 8.5);
    $pdf->SetTextColor(40, 40, 40);
    
    // Fondo gris claro para la narración
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetFillColor(248, 250, 252);
    $pdf->MultiCell(0, 4.5, utf8_decode('"' . $narrar . '"'), 0, 'L', true);
    
    $pdf->Ln(5);
    $pdf->Line(15, $pdf->GetY(), 195, $pdf->GetY());
    $pdf->Ln(4);
}

// ESCENA 1
$mostrar1 = "1. Comienza en la pantalla de inicio de sesión (Login).\n" .
            "2. Mueve el cursor por la pestaña del navegador destacando el nuevo logotipo oficial de FerreMar (Favicon) que reemplaza al trébol de XAMPP.\n" .
            "3. Resalta el nombre de la marca 'FerreMar' en el login.\n" .
            "4. Digita el usuario 'Administrador1' y la clave '123456', y haz clic en Iniciar Sesión.";
$narrar1 = "¡Hola a todos! Bienvenidos a la presentación de FerreMar, nuestro sistema de facturación e inventario de alta gama, totalmente renovado y optimizado para llevar la gestión de tu negocio al siguiente nivel. Como pueden observar desde el inicio, contamos con una identidad corporativa profesional y unificada bajo la marca FerreMar. Incluso en la pestaña de nuestro navegador, el logotipo oficial de la empresa ahora reemplaza por completo al icono genérico de XAMPP, brindando una experiencia digital corporativa impecable desde el primer segundo. Vamos a ingresar al sistema.";

renderEscena($pdf, "1", utf8_decode("Introducción y Branding Oficial"), "0:00 - 0:45", $mostrar1, $narrar1);

// ESCENA 2
$mostrar2 = "1. Al ingresar, muestra el Dashboard principal del sistema.\n" .
            "2. Pasa el cursor por las opciones del menú lateral en blanco impoluto (#ffffff) para mostrar las micro-animaciones (hover).\n" .
            "3. Pasa el mouse sobre las tarjetas de KPI del Dashboard (Ventas, Clientes, Productos) para que se vea cómo se elevan con una transición suave.\n" .
            "4. Destaca la barra superior translúcida con el nombre de la marca.";
$narrar2 = "¡Y aquí estamos! Sean bienvenidos a la nueva interfaz gráfica de FerreMar. Siguiendo las mejores prácticas de software moderno, hemos implementado un Tema Claro (Light Theme) Premium sumamente limpio y espacioso, ideal para evitar la fatiga visual durante largas jornadas de trabajo. Observen el menú lateral en blanco impoluto, la barra superior traslúcida con efecto de vidrio flotante, y las hermosas tarjetas de KPI con bordes curvos y sombras sutiles que le otorgan un aspecto elegante y profesional.";

renderEscena($pdf, "2", utf8_decode("Dashboard y Tema Claro Premium"), "0:45 - 1:20", $mostrar2, $narrar2);

// Nueva página para las siguientes escenas
$pdf->AddPage();

// ESCENA 3
$mostrar3 = "1. Navega en el menú lateral a Productos > Lista de productos.\n" .
            "2. Señala el listado y muestra que los precios salen formateados como '$ 20.000 COP' sin decimales.\n" .
            "3. Haz clic en 'Nuevo producto' en el menú lateral.\n" .
            "4. Digita un producto ficticio y escribe los precios usando puntos para separar miles (ej: escribe 20.000 y 30.000).\n" .
            "5. Guarda el producto exitosamente.";
$narrar3 = "Pasemos al catálogo de productos. Al listar el inventario, vemos que todos los precios están perfectamente formateados en pesos colombianos, reflejando valores reales (como $ 20.000 COP) sin decimales confusos. Además, registrar un producto es ahora más fácil y natural: nuestro sistema cuenta con un sanitizador inteligente que nos permite ingresar valores usando puntos para separar miles directamente, como escribir 25.000 o 30.000, y el sistema los procesa y guarda perfectamente en la base de datos, adaptándose por completo al uso colombiano.";

renderEscena($pdf, "3", utf8_decode("Catálogo y Precios COP Colombiano"), "1:20 - 2:05", $mostrar3, $narrar3);

// ESCENA 4
$mostrar4 = "1. Navega a Ventas > Nueva venta en el menú lateral.\n" .
            "2. Abre el modal de 'Agregar cliente' y muestra que precarga todos tus clientes registrados. Escribe cualquier letra y muestra cómo filtra en vivo.\n" .
            "3. Abre el modal de 'Buscar producto' y muestra la precarga completa con semáforo de stock (verde/rojo) y precios.\n" .
            "4. Filtra por Categoría en el selector desplegable y busca un texto (ej: escribe 'pin') para ver el Live Search filtrando al instante. Agrega el producto.";
$narrar4 = "Ahora, veamos la jagua de la corona: la rapidez al facturar. Al iniciar una nueva venta, el buscador de clientes ahora precarga automáticamente a tus clientes registrados al abrir el modal, y permite filtrarlos en vivo escribiendo cualquier letra. Lo mismo ocurre al buscar productos: el catálogo se precarga de inmediato mostrando el código de barras, precio de venta, y un semáforo visual de stock (en verde si hay existencias o en rojo si es crítico). Además, puedes filtrarlos al instante seleccionando una Categoría o escribiendo su nombre, y la lista se refinará en tiempo real.";

renderEscena($pdf, "4", utf8_decode("Buscador Inteligente (Clientes y Productos)"), "2:05 - 2:50", $mostrar4, $narrar4);

// Nueva página para las últimas escenas
$pdf->AddPage();

// ESCENA 5
$mostrar5 = "1. Con el producto en el carrito de la venta, cambia la cantidad en el cuadro numérico.\n" .
            "2. Pulsa Enter o haz clic en cualquier otra parte de la pantalla.\n" .
            "3. Resalta cómo los subtotales y el Gran Total se recalculan en tiempo real sin diálogos SweetAlert.\n" .
            "4. Ve al menú lateral a Cajas > Lista de cajas y muestra que el saldo en caja también sale como '$ 131.300 COP'.";
$narrar5 = "Una vez agregados los productos al carrito, la facturación es sumamente veloz. Simplemente modificas la cantidad del producto y, al pulsar Enter o hacer clic fuera del campo, los subtotales y el Gran Total se recalculan e incrementan de forma instantánea en tiempo real, sin confirmaciones ni ventanas emergentes molestas. Esta misma elegancia y consistencia en los precios COP la podemos ver en la Lista de Cajas, donde el saldo en efectivo de cada caja de ventas se muestra de forma limpia y clara en pesos colombianos como $ 131.300 COP.";

renderEscena($pdf, "5", utf8_decode("Carrito Dinámico y Módulo de Cajas"), "2:50 - 3:30", $mostrar5, $narrar5);

// ESCENA 6
$mostrar6 = "1. Regresa al Dashboard de inicio.\n" .
            "2. Coloca el cursor sobre el nombre de FerreMar en el menú lateral o superior para concluir la grabación de la pantalla.";
$narrar6 = "En conclusión, FerreMar no es solo un sistema POS; es una herramienta premium, rápida, visualmente espectacular y totalmente adaptada a las necesidades reales de tu negocio. Con su Tema Claro y sus buscadores inteligentes, facturar y controlar tu inventario es ahora una experiencia extraordinaria. ¡Muchas gracias por acompañarnos!";

renderEscena($pdf, "6", utf8_decode("Conclusión y Cierre"), "3:30 - 3:45", $mostrar6, $narrar6);

// Guardar archivo localmente
$pdf->Output('F', 'Guion_Presentacion_FerreMar.pdf');
?>
