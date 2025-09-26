<?php 
    // 1. Define el título específico para esta página
    $pageTitle = "Términos y Condiciones - Stock Manager"; 

    // 2. Incluye el encabezado reutilizable (una sola vez)
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/header.php'; 
?>

<div class="absolute top-6 right-6 flex items-center space-x-2 z-50">
    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
    <div id="theme-toggle" class="cursor-pointer"><div class="theme-toggle-slider"><div id="slider-circle" class="theme-toggle-circle"></div></div></div>
    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
</div>

<div class="flex-grow flex items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-4xl my-16">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white text-center mb-6">Términos y Condiciones de Uso</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm text-center mt-2 mb-8">
            Última actualización: 26 de septiembre de 2025
        </p>
    
        <div class="text-gray-700 dark:text-gray-300 space-y-4 text-left text-sm md:text-base">
            <p>
                Estos Términos y Condiciones de Uso (en adelante, los "Términos") rigen el uso de la plataforma de gestión de inventario "Stock Manager" (en adelante, la "Plataforma"). Al acceder y utilizar la Plataforma, usted acepta y se compromete a cumplir con estos Términos.
            </p>
            
            <h2 class="text-xl font-semibold !mt-6">1. Aceptación de los Términos</h2>
            <p>
                Al registrarse, iniciar sesión o utilizar la Plataforma, usted confirma que ha leído, entendido y aceptado estos Términos en su totalidad. Si no está de acuerdo, no debe utilizar la Plataforma.
            </p>

            <h2 class="text-xl font-semibold !mt-6">2. Elegibilidad y Requisitos de Edad</h2>
            <p>
                Para crear una cuenta y utilizar la Plataforma, usted debe tener al menos 18 años de edad. Al registrarse, usted declara y garantiza que cumple con este requisito. Nos reservamos el derecho de solicitar una comprobación de edad y de suspender o cancelar cuentas que no cumplan con esta condición.
            </p>

            <h2 class="text-xl font-semibold !mt-6">3. Uso del Servicio</h2>
            <p>
                La Plataforma está diseñada para la gestión de inventario. Usted se compromete a utilizar el servicio de manera lícita, ética y solo para los fines previstos. Queda prohibido el uso de la Plataforma para:
            </p>
            <ul class="list-disc list-inside ml-4">
                <li>Actividades ilegales o fraudulentas.</li>
                <li>Acceder a áreas no autorizadas o a datos de otros usuarios.</li>
                <li>Cualquier acción que pueda dañar, sobrecargar o interferir con el funcionamiento de la Plataforma.</li>
            </ul>

            <h2 class="text-xl font-semibold !mt-6">4. Cuentas de Usuario</h2>
            <p>
                Usted es responsable de mantener la confidencialidad de su información de acceso (usuario/matrícula y contraseña) y de todas las actividades que ocurran bajo su cuenta. Debe notificarnos inmediatamente sobre cualquier uso no autorizado de su cuenta.
            </p>

            <h2 class="text-xl font-semibold !mt-6">5. Propiedad Intelectual</h2>
            <p>
                Todo el contenido, diseño, código, logos y elementos de la Plataforma son propiedad exclusiva de Stock Manager y están protegidos por las leyes de derechos de autor y propiedad industrial de México. No está permitido copiar, modificar, distribuir o utilizar de cualquier otra forma la propiedad intelectual sin nuestro permiso expreso por escrito.
            </p>

            <h2 class="text-xl font-semibold !mt-6">6. Limitación de Responsabilidad</h2>
            <p>
                La Plataforma se proporciona "tal cual" y sin garantías de ningún tipo. Stock Manager no será responsable por daños directos, indirectos, incidentales o consecuenciales que resulten del uso o la incapacidad de usar el servicio.
            </p>

            <h2 class="text-xl font-semibold !mt-6">7. Modificaciones de los Términos</h2>
            <p>
                Nos reservamos el derecho de modificar estos Términos en cualquier momento. La versión más reciente estará disponible en la Plataforma. El uso continuado del servicio después de cualquier modificación constituye su aceptación de los nuevos Términos.
            </p>

            <h2 class="text-xl font-semibold !mt-6">8. Legislación Aplicable y Jurisdicción</h2>
            <p>
                Estos Términos se rigen por las leyes de los Estados Unidos Mexicanos. Cualquier disputa derivada de su uso será sometida a la jurisdicción de los tribunales competentes en la Ciudad de México.
            </p>
        </div>
    </div>
</div>

<?php 
    // 4. Incluye el pie de página reutilizable
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php';