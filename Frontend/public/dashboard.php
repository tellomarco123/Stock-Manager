<?php 
    $pageTitle = "Dashboard - Stock Manager"; 
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/header.php';
?>

<div x-data="{ open: false }" class="flex flex-grow w-full">
    <button @click="open = true" class="fixed top-4 left-4 z-40 bg-gray-800 text-white p-2 rounded-full shadow-lg md:hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>

    <aside x-cloak :class="open ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 transform transition duration-300 ease-in-out z-30 bg-white text-gray-800 w-64 p-4 flex flex-col items-center md:relative md:translate-x-0 dark:bg-gray-800 dark:text-gray-100 shadow-lg md:shadow-none">
        <div class="flex justify-between items-center w-full mb-8">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                Stock Manager
            </div>
            <button @click="open = false" class="md:hidden text-gray-500 hover:text-gray-700 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <nav class="w-full flex-grow">
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-200 transition-colors duration-200 mb-2 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Inicio
            </a>
            <a href="#inventario" class="flex items-center p-3 rounded-lg bg-gray-200 text-blue-600 transition-colors duration-200 mb-2 dark:bg-gray-700 dark:text-blue-400">
                <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10h16V7M4 7a2 2 0 01-2-2h20a2 2 0 01-2 2M4 7a2 2 0 00-2 2v8a2 2 0 002 2h16a2 2 0 002-2v-8a2 2 0 00-2-2M9 11h6"></path></svg>
                Inventario
            </a>
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-200 transition-colors duration-200 mb-2 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M17 12h.01"></path></svg>
                Existencias
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-4 md:p-8 ml-0 md:ml-64 transition-all duration-300 ease-in-out">
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4 md:mb-0">Inventario</h1>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    <div id="theme-toggle" class="cursor-pointer"><div class="theme-toggle-slider"><div id="slider-circle" class="theme-toggle-circle"></div></div></div>
                    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                </div>
                <span class="text-gray-600 dark:text-gray-400">Usuario: <span class="font-semibold">Administrador</span></span>
                <a href="/Stock-Manager/" class="text-blue-500 hover:text-blue-700 font-semibold">Cerrar Sesión</a>
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