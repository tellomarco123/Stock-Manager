<?php
// Conexión PDO
require_once __DIR__ . '/../conexiones/conexion_usuarios.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $matricula = trim($_POST['matricula']);
    $nombres = trim($_POST['nombres']);
    $apellido = trim($_POST['apellido']);
    $segundo_apellido = !empty($_POST['segundo_apellido']) ? trim($_POST['segundo_apellido']) : null;
    $correo = trim($_POST['correo']);
    $rol_usuario = trim($_POST['rol_usuario']);

    if (!empty($matricula) && !empty($nombres) && !empty($apellido) && !empty($correo) && !empty($rol_usuario)) {
        try {
            $sql = "INSERT INTO matriculas (matricula, nombres, apellido, segundo_apellido, correo, rol_usuario)
                    VALUES (:matricula, :nombres, :apellido, :segundo_apellido, :correo, :rol_usuario)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':nombres', $nombres);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':segundo_apellido', $segundo_apellido);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':rol_usuario', $rol_usuario);

            if ($stmt->execute()) {
                echo "<script>alert('Registro guardado correctamente'); window.location.href='matriculas.php';</script>";
            } else {
                echo "<script>alert('Error al guardar el registro');</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "<script>alert('Por favor, llena todos los campos obligatorios.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Matrículas</title>
    <link rel="stylesheet" href="../../frontend/public/assets/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 600px;
            margin: 50px auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .card h4 {
            font-weight: 600;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-body">
        <h4 class="text-center mb-4">Registro de Matrícula</h4>
        <form method="POST" action="">

            <div class="mb-3">
                <label class="form-label">Matrícula *</label>
                <input type="text" name="matricula" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombres *</label>
                <input type="text" name="nombres" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido Paterno *</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Segundo Apellido (opcional)</label>
                <input type="text" name="segundo_apellido" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo electrónico *</label>
                <input type="email" name="correo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol de usuario *</label>
                <select name="rol_usuario" class="form-select" required>
                    <option value="">Selecciona un rol</option>
                    <option value="Superadmin">Superadmin</option>
                    <option value="Admin">Admin</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Guardar</button>
                <button type="reset" class="btn btn-secondary px-4">Limpiar</button>
            </div>

        </form>
    </div>
</div>

<script src="../../frontend/public/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
