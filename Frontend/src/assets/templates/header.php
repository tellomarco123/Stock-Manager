<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/Stock-Manager/favicon.ico"> <script>
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    </script>
    <title><?php echo $pageTitle ?? 'Stock Manager'; ?></title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>
    <link rel="stylesheet" href="/Stock-Manager/frontend/src/assets/css/style.css"> </head>
<body class="bg-gray-100 dark:bg-gray-900 flex flex-col min-h-screen">