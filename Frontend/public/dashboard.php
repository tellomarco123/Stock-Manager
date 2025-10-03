<?php
session_start();

// Comprobar que la sesión exista
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al login
    header("Location: /Stock-Manager/frontend/public/index.php");
    exit();
}

// Título de la página
$pageTitle = "Dashboard - Stock Manager"; 

// Incluir header
include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/header.php';
?>

<div x-data="{ open: false }" class="flex flex-grow w-full">
    <!-- Sidebar y contenido del dashboard -->
    <main class="flex-1 p-4 md:p-8 ml-0 md:ml-64 transition-all duration-300 ease-in-out">
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4 md:mb-0">Inventario</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600 dark:text-gray-400">
                    Usuario: <span class="font-semibold"><?php echo htmlspecialchars($_SESSION['usuario_email']); ?></span>
                </span>
                <a href="/Stock-Manager/backend/conexiones/logout.php" class="text-blue-500 hover:text-blue-700 font-semibold">Cerrar Sesión</a>
            </div>
        </header>
        
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <p>Contenido del dashboard en construcción...</p>
        </div>
    </main>
</div>

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php'; 
?>
