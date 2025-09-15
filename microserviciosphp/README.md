# Sistema de Gestión de Restaurante

Este es un sistema de gestión para restaurantes desarrollado en PHP con una arquitectura de microservicios. El sistema permite gestionar categorías de menú, platos y pedidos.

## Características

- Gestión de categorías de menú
- Gestión de platos
- API RESTful para integración con frontend
- Interfaz administrativa

## Requisitos

- Servidor web (Apache/Nginx)
- PHP 7.4 o superior
- MySQL 5.7 o superior
- XAMPP (recomendado para desarrollo)

## Instalación

1. Clonar el repositorio en la carpeta `htdocs` de XAMPP:
   ```
   cd c:/xampp/htdocs
   git clone [URL_DEL_REPOSITORIO]
   ```

2. Crear la base de datos importando el archivo `database/restaurante.sql`

3. Configurar la conexión a la base de datos en `static/bd/conexion.php`

4. Iniciar el servidor de XAMPP y acceder a:
   ```
   http://localhost/MicroserviciosPHP
   ```

## Estructura del Proyecto

- `/api` - Endpoints de la API
- `/static` - Archivos estáticos (CSS, JS, imágenes)
  - `/bd` - Configuración de la base de datos
- `/templates` - Vistas de la aplicación

## Uso de la API

### Obtener todas las categorías
```
GET /api/?categorias=all
```

### Obtener una categoría específica
```
GET /api/?categorias=ID_DE_CATEGORIA
```

### Obtener todos los platos
```
GET /api/?plato=all
```

### Obtener un plato específico
```
GET /api/?plato=busq&busq=ID_DE_PLATO
```

## Base de Datos

El esquema de la base de datos incluye las siguientes tablas:
- `res_categorias` - Almacena las categorías del menú
- `res_productos` - Almacena los platos del menú
- `res_pedidos` - Registra los pedidos realizados
- `res_detalle_pedido` - Detalle de los productos en cada pedido

## Contribución

1. Haz un fork del proyecto
2. Crea una rama para tu característica (`git checkout -b feature/nueva-caracteristica`)
3. Haz commit de tus cambios (`git commit -am 'Añade nueva característica'`)
4. Haz push a la rama (`git push origin feature/nueva-caracteristica`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT.
