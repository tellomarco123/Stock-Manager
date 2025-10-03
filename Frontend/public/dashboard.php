<?php 
    $pageTitle = "Dashboard - Stock Manager"; 
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/header.php';
?>

<div x-data="{ 
        open: false, 
        activeSection: 'usuarios',
        selectedUser: null,
        selectedItem: null,
        currentUser: { email: 'super.admin@stockmanager.com', role: 'Super Admin' },
        users: [
            { id: 1, name: 'Carlos Rivera', email: 'carlos.rivera@email.com', role: 'Admin' },
            { id: 2, name: 'Ana Gomez', email: 'ana.gomez@email.com', role: 'User' },
            { id: 3, name: 'Luis Fernandez', email: 'luis.fernandez@email.com', role: 'User' }
        ],
        inventory: [
            { id: 101, name: 'Viga de Acero 5/8', category: 'Metal', quantity: 150 },
            { id: 102, name: 'Tablón de Pino 2x4', category: 'Madera', quantity: 300 },
            { id: 103, name: 'Lámina Galvanizada Cal. 26', category: 'Metal', quantity: 80 }
        ]
    }" class="flex flex-grow w-full min-h-screen bg-gray-100 dark:bg-gray-900">

    <button @click="open = true" class="fixed top-4 left-4 z-40 bg-gray-800 text-white p-2 rounded-full shadow-lg md:hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>

    <aside x-cloak :class="open ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 transform transition duration-300 ease-in-out z-30 bg-white text-gray-800 w-64 p-4 flex flex-col items-center md:relative md:translate-x-0 dark:bg-gray-800 dark:text-gray-100 shadow-lg md:shadow-none">
        <div class="flex justify-between items-center w-full mb-8">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">Stock Manager</div>
            <button @click="open = false" class="md:hidden text-gray-500 hover:text-gray-700 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <nav class="w-full flex-grow">
            <a href="#" @click.prevent="activeSection = 'usuarios'; selectedUser = null; selectedItem = null" 
               :class="{ 'bg-gray-200 text-blue-600 dark:bg-gray-700 dark:text-blue-400': activeSection === 'usuarios' }"
               class="flex items-center p-3 rounded-lg hover:bg-gray-200 transition-colors duration-200 mb-2 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Administrar Usuarios
            </a>
            <a href="#" @click.prevent="activeSection = 'inventario'; selectedUser = null; selectedItem = null" 
               :class="{ 'bg-gray-200 text-blue-600 dark:bg-gray-700 dark:text-blue-400': activeSection === 'inventario' }"
               class="flex items-center p-3 rounded-lg hover:bg-gray-200 transition-colors duration-200 mb-2 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10h16V7M4 7a2 2 0 01-2-2h20a2 2 0 01-2 2M4 7a2 2 0 00-2 2v8a2 2 0 002 2h16a2 2 0 002-2v-8a2 2 0 00-2-2M9 11h6"></path></svg>
                Administrar Inventario
            </a>
            <a href="#" @click.prevent="activeSection = 'ajustes'; selectedUser = null; selectedItem = null" 
               :class="{ 'bg-gray-200 text-blue-600 dark:bg-gray-700 dark:text-blue-400': activeSection === 'ajustes' }"
               class="flex items-center p-3 rounded-lg hover:bg-gray-200 transition-colors duration-200 mb-2 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0 3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.096 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Ajustes
            </a>
        </nav>
    </aside>
    <main class="flex-1 p-4 md:p-8 ml-0 md:ml-0 transition-all duration-300 ease-in-out">
        
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4 md:mb-0" 
                x-text="activeSection === 'usuarios' ? 'Administrar Usuarios' : (activeSection === 'inventario' ? 'Administrar Inventario' : 'Ajustes')">
            </h1>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    <div id="theme-toggle" class="cursor-pointer"><div class="theme-toggle-slider"><div id="slider-circle" class="theme-toggle-circle"></div></div></div>
                    <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                </div>
                <div class="text-gray-600 dark:text-gray-400">
                    <span class="font-semibold" x-text="currentUser.email"></span>
                    (<span x-text="currentUser.role"></span>)
                </div>
                <a href="/Stock-Manager/" class="text-blue-500 hover:text-blue-700 font-semibold">Cerrar Sesión</a>
            </div>
        </header>
        <div x-show="activeSection === 'usuarios'" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md transition-colors duration-200">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Usuarios Registrados</h2>
                <div class="space-y-3">
                    <template x-for="user in users" :key="user.id">
                        <div @click="selectedUser = user"
                             class="p-4 rounded-lg cursor-pointer transition-colors duration-200 flex justify-between items-center"
                             :class="selectedUser && selectedUser.id === user.id ? 'bg-blue-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700/50'">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white" x-text="user.name"></p>
                                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="user.email"></p>
                            </div>
                            <span class="text-sm font-medium px-2 py-1 rounded-full"
                                  :class="{ 'bg-green-200 text-green-800': user.role === 'Admin', 'bg-yellow-200 text-yellow-800': user.role === 'User' }"
                                  x-text="user.role"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md transition-colors duration-200">
                <div x-show="!selectedUser">
                    <p class="text-gray-500 dark:text-gray-400 text-center mt-8">Selecciona un usuario de la lista para ver o editar sus detalles.</p>
                </div>
                <div x-show="selectedUser" x-transition>
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Editar Usuario: <span x-text="selectedUser ? selectedUser.name : ''" class="text-blue-600 dark:text-blue-400"></span></h2>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="userName">Nombre Completo</label>
                            <input :value="selectedUser ? selectedUser.name : ''" type="text" id="userName" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="userEmail">Correo Electrónico</label>
                            <input :value="selectedUser ? selectedUser.email : ''" type="email" id="userEmail" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="userPassword">Nueva Contraseña</label>
                            <input placeholder="Dejar en blanco para no cambiar" type="password" id="userPassword" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="userRole">Rol de Usuario</label>
                            <select id="userRole" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option :selected="selectedUser && selectedUser.role === 'Super Admin'">Super Admin</option>
                                <option :selected="selectedUser && selectedUser.role === 'Admin'">Admin</option>
                                <option :selected="selectedUser && selectedUser.role === 'User'">User</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Eliminar</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div x-show="activeSection === 'inventario'" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md transition-colors duration-200">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Materiales en Inventario</h2>
                <div class="space-y-3">
                    <template x-for="item in inventory" :key="item.id">
                        <div @click="selectedItem = item"
                             class="p-4 rounded-lg cursor-pointer transition-colors duration-200 flex justify-between items-center"
                             :class="selectedItem && selectedItem.id === item.id ? 'bg-blue-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700/50'">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white" x-text="item.name"></p>
                                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="`Categoría: ${item.category}`"></p>
                            </div>
                            <span class="text-lg font-bold text-gray-800 dark:text-gray-100" x-text="item.quantity"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md transition-colors duration-200">
                <div x-show="!selectedItem">
                     <p class="text-gray-500 dark:text-gray-400 text-center mt-8">Selecciona un material de la lista para editarlo o agrega uno nuevo.</p>
                </div>
                 <div x-show="selectedItem" x-transition>
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Editar Material: <span x-text="selectedItem ? selectedItem.name : ''" class="text-blue-600 dark:text-blue-400"></span></h2>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="itemName">Nombre del Material</label>
                            <input :value="selectedItem ? selectedItem.name : ''" type="text" id="itemName" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="itemCategory">Categoría</label>
                            <select id="itemCategory" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option :selected="selectedItem && selectedItem.category === 'Metal'">Metal</option>
                                <option :selected="selectedItem && selectedItem.category === 'Madera'">Madera</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="itemQuantity">Cantidad</label>
                            <input :value="selectedItem ? selectedItem.quantity : ''" type="number" id="itemQuantity" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Eliminar</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div x-show="activeSection === 'ajustes'">
             <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md transition-colors duration-200">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Ajustes del Sistema</h2>
                <p class="text-gray-600 dark:text-gray-400">Esta sección está en construcción. Aquí se podrán realizar configuraciones avanzadas de la base de datos y del sistema en general.</p>
            </div>
        </div>
        </main>
    </div>
<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/Stock-Manager/Frontend/src/assets/templates/footer.php'; 
?>