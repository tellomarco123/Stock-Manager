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
    //Verificar si la matrícula existe en la tabla matriculas
    $stmt = $conn->prepare("
        SELECT nombres, apellido, segundo_apellido, correo, rol_usuario 
        FROM matriculas 
        WHERE matricula = :matricula
    ");
    $stmt->execute([':matricula' => $matricula]);
    $registroMatricula = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$registroMatricula) {
        responder('error', 'La matrícula no existe en el sistema.');
    }

    //Verificar que los datos coincidan con los de la tabla matriculas
    $coincideNombre  = (strcasecmp(trim($registroMatricula['nombres']), $nombre) === 0);
    $coincideApellido = (strcasecmp(trim($registroMatricula['apellido']), $apellidoPaterno) === 0);
    $coincideCorreo   = (strcasecmp(trim($registroMatricula['correo']), $correo) === 0);

    if (!$coincideNombre || !$coincideApellido || !$coincideCorreo) {
        responder('error', 'Los datos no coinciden con la matrícula registrada.');
    }

    // Verificar si el correo o la matrícula ya están registrados en users
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = :email OR matricula = :matricula");
    $stmt->execute([':email' => $correo, ':matricula' => $matricula]);
    if ($stmt->rowCount() > 0) responder('error', 'El correo o la matrícula ya están registrados.');

    // Insertar usuario nuevo en users con su rol de la tabla matriculas
    $stmt = $conn->prepare("
        INSERT INTO users (first_name, last_name_1, last_name_2, birth_date, email, password, matricula, rol_usuario)
        VALUES (:first_name, :last_name_1, :last_name_2, :birth_date, :email, :password, :matricula, :rol_usuario)
    ");
    $stmt->execute([
        ':first_name'  => $nombre,
        ':last_name_1' => $apellidoPaterno,
        ':last_name_2' => $apellidoMaternoDB,
        ':birth_date'  => $fechaNacimiento,
        ':email'       => $correo,
        ':password'    => $passwordHash,
        ':matricula'   => $matricula,
        ':rol_usuario' => $registroMatricula['rol_usuario']
    ]);

    responder('success', '¡Registro exitoso! Tu cuenta ha sido creada.');
} catch (PDOException $e) {
    responder('error', 'Error en la base de datos: ' . $e->getMessage());
}
