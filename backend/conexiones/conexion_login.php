<?php
// Iniciar sesión
session_start();

// Forzar uso de cookies
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);

// Incluir la conexión PDO
require_once __DIR__ . "/conexion_usuarios.php"; // Revisa que esta ruta sea correcta

// Recibir datos del formulario
$email = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Usuario y contraseña requeridos.");
}

try {
    // Buscar usuario por email
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verificar contraseña
        if (password_verify($password, $user['password'])) {

            // Guardar variables de sesión
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_email'] = $user['email'];

            // Redirigir al dashboard
            $dashboardPath = '/Stock-Manager/frontend/public/dashboard.php';
            header("Location: $dashboardPath");
        exit();

        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>
