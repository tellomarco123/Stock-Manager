<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("conexion_usuarios.php");

// Recibir y sanitizar datos
$nombre     = trim($_POST['nombre'] ?? '');
$apellidos  = trim($_POST['apellidos'] ?? '');
$correo     = trim($_POST['correo'] ?? '');
$password   = $_POST['password'] ?? '';
$confirmar  = $_POST['confirmar'] ?? '';
$matricula  = trim($_POST['matricula'] ?? '');

// Validaciones
if (!$nombre || !$apellidos || !$correo || !$password || !$confirmar || !$matricula) die("Error: Todos los campos son obligatorios.");
if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}$/", $nombre)) die("Error: Nombre inválido.");
if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}$/", $apellidos)) die("Error: Apellidos inválidos.");
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) die("Error: Correo inválido.");
if (strlen($password) < 8) die("Error: La contraseña debe tener al menos 8 caracteres.");
if ($password !== $confirmar) die("Error: Las contraseñas no coinciden.");

// Hash de contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

try {
    // Verificar duplicados
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = :email OR matricula = :matricula");
    $stmt->execute([':email' => $correo, ':matricula' => $matricula]);
    if ($stmt->rowCount() > 0) die("Error: El correo o la matrícula ya están registrados.");

    // Insertar usuario
    $stmt = $conn->prepare("
        INSERT INTO users (first_name, last_name, email, password, matricula)
        VALUES (:first_name, :last_name, :email, :password, :matricula)
    ");
    $stmt->execute([
        ':first_name' => $nombre,
        ':last_name'  => $apellidos,
        ':email'      => $correo,
        ':password'   => $passwordHash,
        ':matricula'  => $matricula
    ]);

    // Redirigir automáticamente al login
    header("Location: ../../frontend/public/index.html");
    exit;

} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
}
