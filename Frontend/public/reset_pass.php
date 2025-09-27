<?php
    // --- Lógica de PHP para manejar el token ---
    $tokenValido = false;
    $token = '';
    $mensajeError = '';

    // 1. Verifica si el token existe en la URL
    if (isset($_GET['token']) && !empty($_GET['token'])) {
        $token = htmlspecialchars($_GET['token']);
        
        // 2. Aquí, el backend debería verificar si el token es válido y no ha expirado.
        // Por ahora, para el frontend, asumiremos que es válido si existe.
        $tokenValido = true;

    } else {
        $mensajeError = "El enlace de recuperación es inválido o ha expirado. Por favor, solicita uno nuevo.";
    }

    $pageTitle = "Establecer Nueva Contraseña - Stock Manager"; 
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/header.php'; 
?>

<div class="absolute top-6 right-6 flex items-center space-x-2 z-50">
    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
    <div id="theme-toggle" class="cursor-pointer"><div class="theme-toggle-slider"><div id="slider-circle" class="theme-toggle-circle"></div></div></div>
    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
</div>

<div class="flex-grow flex items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-sm">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Establecer Nueva Contraseña</h1>
        </div>
        
        <?php if ($tokenValido): ?>
            <form action="[URL_DEL_ENDPOINT_BACKEND_PARA_RESET]" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Nueva Contraseña</label>
                    <input type="password" id="new_password" name="new_password" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="••••••••">
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Confirmar Nueva Contraseña</label>
                    <input type="password" id="confirm_password" name="confirm_password" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="••••••••">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                        Guardar Contraseña
                    </button>
                </div>
            </form>
        <?php else: ?>
            <p class="text-center text-red-500"><?php echo $mensajeError; ?></p>
            <div class="mt-6 text-center">
                <a href="/Stock-Manager/recovery_pass.php" class="font-bold text-sm text-blue-500 hover:text-blue-700">
                    Solicitar un nuevo enlace
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php'; 
?>