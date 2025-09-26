<?php 
    // 1. Define el título específico para esta página
    $pageTitle = "Aviso de Privacidad - Stock Manager"; 

    // 2. Incluye el encabezado reutilizable (solo una vez)
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/header.php'; 
?>

<div class="absolute top-6 right-6 flex items-center space-x-2 z-50">
    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
    <div id="theme-toggle" class="cursor-pointer"><div class="theme-toggle-slider"><div id="slider-circle" class="theme-toggle-circle"></div></div></div>
    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
</div>

<div class="flex-grow flex items-center justify-center">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 md:p-8 rounded-lg shadow-md my-16">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-800 dark:text-gray-100">Aviso de Privacidad Integral</h1>
        <p class="text-sm text-center mb-6 text-gray-600 dark:text-gray-400">
            Última actualización: 26 de septiembre de 2025
        </p>
    
        <p class="mb-4 text-sm md:text-base">
            En **Stock Manager**, reconocemos la importancia de proteger su privacidad y sus datos personales. El presente Aviso de Privacidad tiene como objetivo informarle sobre el tratamiento que se le da a sus datos personales recabados a través de nuestra plataforma web.
        </p>
    
        <h2 class="text-xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">1. Identidad y Domicilio del Responsable</h2>
        <p class="mb-4 text-sm md:text-base">
            El responsable del tratamiento de los datos personales es el equipo de desarrollo del proyecto "Stock Manager", con domicilio en [Tu dirección o una dirección ficticia si es un proyecto estudiantil].
        </p>
    
        <h2 class="text-xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">2. Datos Personales Recabados</h2>
        <p class="mb-4 text-sm md:text-base">
            Para las finalidades descritas en este aviso, recabamos los siguientes datos personales a través de nuestro formulario de registro:
            <ul class="list-disc list-inside ml-4 mt-2">
                <li class="mb-1"><strong>Datos de Identificación:</strong> Nombre(s), Apellido 1 y Apellido 2.</li>
                <li class="mb-1"><strong>Datos Demográficos:</strong> Fecha de Nacimiento.</li>
                <li class="mb-1"><strong>Datos de Contacto:</strong> Correo electrónico.</li>
                <li class="mb-1"><strong>Datos de Autenticación:</strong> Contraseña (cifrada) y Matrícula.</li>
            </ul>
        </p>
    
        <h2 class="text-xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">3. Finalidades del Tratamiento de Datos</h2>
        <p class="mb-4 text-sm md:text-base">
            Sus datos personales son utilizados exclusivamente para las siguientes finalidades necesarias:
            <ul class="list-disc list-inside ml-4 mt-2">
                <li class="mb-1">Crear y administrar su cuenta de usuario en la plataforma.</li>
                <li class="mb-1">Verificar su identidad y autenticar su acceso de forma segura.</li>
                <li class="mb-1">Validar que cumple con la edad mínima requerida (18 años) para utilizar el servicio.</li>
                <li class="mb-1">Garantizar la seguridad y el correcto funcionamiento del sistema.</li>
            </ul>
        </p>
        
        <h2 class="text-xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">4. Medidas de Seguridad</h2>
        <p class="mb-4 text-sm md:text-base">
            Nos comprometemos a proteger sus datos personales con medidas de seguridad robustas, incluyendo el cifrado de contraseñas y el uso de un entorno de microservicios, para evitar su pérdida, uso indebido, acceso no autorizado, alteración o divulgación.
        </p>
    
        <h2 class="text-xl font-semibold mt-6 mb-2 text-gray-800 dark:text-gray-100">5. Derechos ARCO y Mecanismos para su Ejercicio</h2>
        <p class="mb-4 text-sm md:text-base">
            Usted tiene derecho a conocer qué datos personales tenemos de usted (Acceso), solicitar la corrección de su información (Rectificación), que la eliminemos de nuestros registros (Cancelación) y oponerse al uso de sus datos para fines específicos (Oposición).
        </p>
        <p class="mb-4 text-sm md:text-base">
            Para el ejercicio de sus Derechos ARCO, deberá enviar una solicitud por correo electrónico a [tu-correo-de-contacto@ejemplo.com].
        </p> 
    </div>
</div>

<?php 
    
include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php'; 
?>