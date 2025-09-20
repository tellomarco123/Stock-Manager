const themeToggle = document.getElementById('theme-toggle');
const sliderCircle = document.getElementById('slider-circle');
const html = document.documentElement;
const sunIcon = document.getElementById('sun-icon');
const moonIcon = document.getElementById('moon-icon');

function updateTheme() {
    if (html.classList.contains('dark')) {
        sliderCircle.classList.add('dark-mode');
        sunIcon.classList.replace('text-yellow-500', 'text-gray-500');
        moonIcon.classList.replace('text-gray-500', 'text-indigo-400');
    } else {
        sliderCircle.classList.remove('dark-mode');
        sunIcon.classList.replace('text-gray-500', 'text-yellow-500');
        moonIcon.classList.replace('text-indigo-400', 'text-gray-500');
    }
}

// Detectar la preferencia del sistema y establecer el tema inicial
if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
}
updateTheme();

// Escuchar el click en el botón para cambiar el tema
themeToggle.addEventListener('click', () => {
    html.classList.toggle('dark');
    const newTheme = html.classList.contains('dark') ? 'dark' : 'light';
    localStorage.setItem('theme', newTheme);
    updateTheme();
});