<?php
// Iniciar sesión
session_start();

// Forzar uso de cookies
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);

// Incluir la conexión PDO
require_once __DIR__ . "/conexion_usuarios.php";

// Recibir datos del formulario
$email = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Usuario y contraseña requeridos.");
}

try {
    // Buscar usuario por correo
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verificar contraseña
        if (password_verify($password, $user['password'])) {

            // Obtener el rol del usuario desde la tabla matriculas
            $sqlRol = "SELECT rol_usuario FROM matriculas WHERE matricula = :matricula LIMIT 1";
            $stmtRol = $conn->prepare($sqlRol);
            $stmtRol->bindParam(':matricula', $user['matricula'], PDO::PARAM_STR);
            $stmtRol->execute();
            $rolData = $stmtRol->fetch(PDO::FETCH_ASSOC);

            $rol = $rolData ? $rolData['rol_usuario'] : 'Usuario'; // Por defecto Usuario si no hay registro

            // Guardar variables de sesión
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_email'] = $user['email'];
            $_SESSION['usuario_nombre'] = $user['first_name'];
            $_SESSION['usuario_rol'] = $rol;

            // Redirigir según el rol
            switch ($rol) {
                case 'Superadmin':
                    header("Location: /Stock-Manager/frontend/public/dashboard.php");
                    break;

                case 'Admin':
                    header("Location: /Stock-Manager/frontend/public/dashboard_admin.php");
                    break;

                case 'Usuario':
                default:
                    header("Location: /Stock-Manager/frontend/public/dashboard_users.php");
                    break;
            }
            exit();

        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado.'); window.history.back();</script>";
    }

} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>
