<footer class="text-center text-sm text-gray-500 dark:text-gray-400 w-full p-4">
        <p>
            Todos los derechos de autor reservados, <?php echo date("Y"); ?> Stock Manager

            <?php
            // Por defecto, los enlaces se muestran.
            // Solo se ocultarán si la página que incluye este archivo define la variable $showFooterLinks = false;
            if (!isset($showFooterLinks) || $showFooterLinks === true):
            ?>
                <span class="mx-2">|</span>
                <a href="/Stock-Manager/terminos_y_condiciones.php" class="text-blue-500 hover:text-blue-700" target="_blank">Términos y Condiciones</a>
                <span class="mx-2">|</span>
                <a href="/Stock-Manager/aviso_privacidad.php" class="text-blue-500 hover:text-blue-700" target="_blank">Aviso de Privacidad</a>
            <?php endif; ?>
        </p>
    </footer>

    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="/Stock-Manager/frontend/src/assets/js/script.js"></script>

</body>
</html>