<?php 
    $pageTitle = "Recuperar Contraseña - Stock Manager"; 
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
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Recuperar Contraseña</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm md:text-base">
                Ingresa tu correo para enviarte un enlace de recuperación.
            </p>
        </div>
        
        <form action="[URL_DEL_ENDPOINT_BACKEND]" method="post">
            <div class="mb-4">
                <label for="correo" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="ejemplo@correo.com">
            </div>

            <div class="mb-6 h-20 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-lg">
                <p class="text-gray-500 dark:text-gray-400 text-sm">Espacio para reCAPTCHA</p>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                    Enviar Enlace de Recuperación
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <a href="/Stock-Manager/" class="font-bold text-sm text-blue-500 hover:text-blue-700">
                Volver al Inicio de Sesión
            </a>
        </div>
    </div>
</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php'; 
?>