<?php 
    // Define el título específico para esta página
    $pageTitle = "Stock Manager - Registro"; 

    // Incluye el encabezado reutilizable
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
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Stock Manager</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm md:text-base">Crea tu cuenta</p>
        </div>
        <form id="registroForm" action="./backend/conexiones/insert_usuarios_registro.php" method="post">
            <div class="mb-4">
                <label for="nombres" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Nombre(s)</label>
                <input type="text" id="nombres" name="nombres" required maxlength="40" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}" title="Solo letras y máximo 40 caracteres" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="Nombre(s)">
            </div>
            <div class="mb-4">
                <label for="apellidoPaterno" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Apellido 1</label>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" required maxlength="40" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}" title="Solo letras y máximo 40 caracteres" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="Ingresa tu primer apellido">
            </div>
            <div class="mb-4">
                <label for="apellidoMaterno" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Apellido 2</label>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno" maxlength="40" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,40}" title="Solo letras y máximo 40 caracteres" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="Ingresa tu segundo apellido">
            </div>
            <div class="mb-4">
                <label for="fechaNacimiento" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Fecha de Nacimiento</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600">

            </div>
            <div class="mb-4">
                <label for="correo" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required maxlength="40" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="ejemplo@correo.com">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="••••••••">
            </div>
            <div class="mb-4">
                <label for="confirmar" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Confirmar Contraseña</label>
                <input type="password" id="confirmar" name="confirmar" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="••••••••">
            </div>
            <div class="mb-6">
                <label for="matricula" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Matrícula</label>
                <input type="text" id="matricula" name="matricula" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600" placeholder="Ingresa tu matrícula">
            </div>
            <div class="mb-6 flex items-center">
                <div class="checkbox-wrapper-19">
                    <input type="checkbox" id="acepto-terminos" name="acepto-terminos" required />
                    <label for="acepto-terminos" class="check-box"></label>
                </div>
                <label for="acepto-terminos" class="ml-3 text-sm text-gray-700 dark:text-gray-300 cursor-pointer">
                    He leído y acepto los
                    <a href="/Stock-Manager/terminos_y_condiciones.php" class="font-bold text-blue-500 hover:text-blue-700" target="_blank">Términos y Condiciones</a> y el 
                    <a href="/Stock-Manager/aviso_privacidad.php" class="font-bold text-blue-500 hover:text-blue-700" target="_blank">Aviso de Privacidad</a>.
                </label>
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                    Registrarse
                </button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                ¿Ya tienes una cuenta?
                <a href="/Stock-Manager/" class="font-bold text-blue-500 hover:text-blue-700">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>

<?php 
    
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php'; 
?>