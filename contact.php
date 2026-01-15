<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Manejar preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
    exit();
}

// Obtener datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar campos requeridos
$required = ['nombre', 'apellidos', 'empresa', 'cargo', 'email', 'telefono', 'mensaje', 'privacy'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Campos incompletos']);
        exit();
    }
}

// Extraer datos
$nombre = htmlspecialchars($data['nombre']);
$apellidos = htmlspecialchars($data['apellidos']);
$empresa = htmlspecialchars($data['empresa']);
$cargo = htmlspecialchars($data['cargo']);
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$telefono = htmlspecialchars($data['telefono']);
$mensaje = htmlspecialchars($data['mensaje']);

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Email inválido']);
    exit();
}

// Configuración del correo
$destinatario = 'contacto@divcalpe.com';
$asunto = 'Nuevo contacto desde la web DIVCAL';

// Mensaje del correo
$cuerpo = "
Nuevo mensaje de contacto desde la web DIVCAL

Datos del contacto:
------------------
Nombre: $nombre $apellidos
Empresa: $empresa
Cargo: $cargo
Email: $email
Teléfono: $telefono

Mensaje:
--------
$mensaje

--
Este mensaje fue enviado desde el formulario de contacto de divcalpe.com
";

// Cabeceras del correo
$cabeceras = "From: Web DIVCAL <contacto@divcalpe.com>\r\n";
$cabeceras .= "Reply-To: $email\r\n";
$cabeceras .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar correo
if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
    http_response_code(200);
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Error enviando correo']);
}
?>
