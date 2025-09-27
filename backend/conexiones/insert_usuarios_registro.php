<?php
header('Content-Type: application/json');

// Conexión a la base de datos
include __DIR__ . '/conexion_usuarios.php';

// Función de respuesta JSON
function responder($status, $message) {
    echo json_encode(['status' => $status, 'message' => $message]);
    exit;
}

// Recibir datos del formulario y limpiar espacios
$nombre           = trim($_POST['nombres'] ?? '');
$apellidoPaterno  = trim($_POST['apellidoPaterno'] ?? '');
$apellidoMaterno  = trim($_POST['apellidoMaterno'] ?? '');
$fechaNacimiento  = trim($_POST['fechaNacimiento'] ?? '');
$correo           = trim($_POST['correo'] ?? '');
$password         = $_POST['password'] ?? '';
$confirmar        = $_POST['confirmar'] ?? '';
$matricula        = trim($_POST['matricula'] ?? '');

// Validaciones básicas
if (!$nombre || !$apellidoPaterno || !$fechaNacimiento || !$correo || !$password || !$confirmar || !$matricula) {
    responder('error', 'Faltan campos obligatorios.');
}

if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}$/", $nombre)) responder('error', 'Nombre inválido.');
if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}$/", $apellidoPaterno)) responder('error', 'Apellido Paterno inválido.');
if ($apellidoMaterno && !preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}$/", $apellidoMaterno)) responder('error', 'Apellido Materno inválido.');
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) responder('error', 'Correo inválido.');
if (strlen($password) < 8) responder('error', 'La contraseña debe tener al menos 8 caracteres.');
if ($password !== $confirmar) responder('error', 'Las contraseñas no coinciden.');
if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fechaNacimiento)) responder('error', 'Fecha inválida (YYYY-MM-DD).');

$passwordHash      = password_hash($password, PASSWORD_DEFAULT);
$apellidoMaternoDB = empty($apellidoMaterno) ? null : $apellidoMaterno;

try {
    // Verificar si el correo o la matrícula ya existen
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = :email OR matricula = :matricula");
    $stmt->execute([':email' => $correo, ':matricula' => $matricula]);
    if ($stmt->rowCount() > 0) responder('error', 'El correo o la matrícula ya están registrados.');

    // Insertar usuario en la tabla
    $stmt = $conn->prepare("
        INSERT INTO users (first_name, last_name_1, last_name_2, birth_date, email, password, matricula)
        VALUES (:first_name, :last_name_1, :last_name_2, :birth_date, :email, :password, :matricula)
    ");
    $stmt->execute([
        ':first_name'  => $nombre,
        ':last_name_1' => $apellidoPaterno,
        ':last_name_2' => $apellidoMaternoDB,
        ':birth_date'  => $fechaNacimiento,
        ':email'       => $correo,
        ':password'    => $passwordHash,
        ':matricula'   => $matricula
    ]);

    responder('success', '¡Registro exitoso!');
} catch (PDOException $e) {
    responder('error', 'Error en la base de datos: ' . $e->getMessage());
}
