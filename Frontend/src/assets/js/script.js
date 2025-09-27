document.addEventListener('DOMContentLoaded', () => {

    let calendarInstance = null;

    // --- SECCIÓN 1: CÓDIGO DEL INTERRUPTOR DE TEMA ---
    const themeToggle = document.getElementById('theme-toggle');
    const sliderCircle = document.getElementById('slider-circle');
    const html = document.documentElement;
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');

    function updateTheme() {
        const isDark = html.classList.contains('dark');

        if (isDark) {
            sliderCircle.classList.add('dark-mode');
            sunIcon.classList.replace('text-yellow-500', 'text-gray-500');
            moonIcon.classList.replace('text-gray-500', 'text-indigo-400');
        } else {
            sliderCircle.classList.remove('dark-mode');
            sunIcon.classList.replace('text-gray-500', 'text-yellow-500');
            moonIcon.classList.replace('text-indigo-400', 'text-gray-500');
        }

        if (calendarInstance) {
            if (isDark) {
                calendarInstance.calendarContainer.classList.add('fp-dark');
            } else {
                calendarInstance.calendarContainer.classList.remove('fp-dark');
            }
        }
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
            updateTheme();
        });
    }

    // --- SECCIÓN 2: CÓDIGO DEL CALENDARIO ---
    const hoy = new Date();
    calendarInstance = flatpickr("#fechaNacimiento", {
        locale: "es",
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        maxDate: new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate()),
        minDate: new Date(hoy.getFullYear() - 110, hoy.getMonth(), hoy.getDate()),
        disableMobile: "true"
    });

    updateTheme();

    // --- SECCIÓN 3: LÓGICA DEL FORMULARIO CON AJAX ---
    const registroForm = document.getElementById('registroForm');
    if (registroForm) {
        registroForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const fechaNacimientoInput = document.getElementById('fechaNacimiento');
            if (!fechaNacimientoInput.value) {
                mostrarError("Por favor, selecciona tu fecha de nacimiento.");
                return;
            }

            const fechaNacimiento = new Date(fechaNacimientoInput.value);
            const fechaMinima = new Date(new Date().getFullYear() - 18, new Date().getMonth(), new Date().getDate());

            if (fechaNacimiento > fechaMinima) {
                mostrarError("Debes ser mayor de 18 años para registrarte.");
                return;
            }

            // --- Enviar datos por AJAX ---
            const formData = new FormData(this);

            fetch('/Stock-Manager/backend/conexiones/insert_usuarios_registro.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    mostrarExito(data.message);
                    // Redirigir al login después de 2 segundos
                    setTimeout(() => { window.location.href = '/Stock-Manager/'; }, 2000);
                } else {
                    mostrarError(data.message);
                }
            })
            .catch(err => mostrarError('Ocurrió un error: ' + err));
        });
    }

    // --- FUNCIONES DE ALERTA ---
    const alertThemes = {
        light: { background: '#fff', color: '#374151' },
        dark: { background: '#1f2937', color: '#d1d5db' }
    };
    function mostrarExito(mensaje) {
        const isDarkMode = document.documentElement.classList.contains('dark');
        const theme = isDarkMode ? alertThemes.dark : alertThemes.light;
        Swal.fire({
            icon: 'success', title: '¡Excelente!', text: mensaje,
            background: theme.background, color: theme.color,
            confirmButtonColor: '#3b82f6'
        });
    }
    function mostrarError(mensaje) {
        const isDarkMode = document.documentElement.classList.contains('dark');
        const theme = isDarkMode ? alertThemes.dark : alertThemes.light;
        Swal.fire({
            icon: 'error', title: 'Oops...', text: mensaje,
            background: theme.background, color: theme.color,
            confirmButtonColor: '#ef4444'
        });
    }
});
