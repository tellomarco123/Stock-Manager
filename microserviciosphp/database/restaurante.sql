-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS restaurante2022;
USE restaurante2022;

-- Tabla de categorías
CREATE TABLE IF NOT EXISTS res_categorias (
    cat_id INT AUTO_INCREMENT PRIMARY KEY,
    cat_nombre VARCHAR(100) NOT NULL,
    cat_imagen VARCHAR(255),
    cat_estado ENUM('activo', 'inactivo') DEFAULT 'activo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de productos/platos
CREATE TABLE IF NOT EXISTS res_productos (
    pro_id INT AUTO_INCREMENT PRIMARY KEY,
    pro_nombre VARCHAR(100) NOT NULL,
    pro_descripcion TEXT,
    pro_precio DECIMAL(10,2) NOT NULL,
    pro_imagen VARCHAR(255),
    cat_id INT NOT NULL,
    pro_estado ENUM('disponible', 'agotado', 'inactivo') DEFAULT 'disponible',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cat_id) REFERENCES res_categorias(cat_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de pedidos
CREATE TABLE IF NOT EXISTS res_pedidos (
    ped_id INT AUTO_INCREMENT PRIMARY KEY,
    ped_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ped_cliente_nombre VARCHAR(100) NOT NULL,
    ped_cliente_telefono VARCHAR(20),
    ped_direccion TEXT,
    ped_estado ENUM('pendiente', 'en_preparacion', 'en_camino', 'entregado', 'cancelado') DEFAULT 'pendiente',
    ped_total DECIMAL(10,2) NOT NULL,
    ped_observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de detalle de pedidos
CREATE TABLE IF NOT EXISTS res_detalle_pedido (
    det_id INT AUTO_INCREMENT PRIMARY KEY,
    ped_id INT NOT NULL,
    pro_id INT NOT NULL,
    det_cantidad INT NOT NULL,
    det_precio_unitario DECIMAL(10,2) NOT NULL,
    det_subtotal DECIMAL(10,2) NOT NULL,
    det_observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ped_id) REFERENCES res_pedidos(ped_id) ON DELETE CASCADE,
    FOREIGN KEY (pro_id) REFERENCES res_productos(pro_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar datos de ejemplo
INSERT INTO res_categorias (cat_nombre, cat_imagen, cat_estado) VALUES
('Entradas', 'entradas.jpg', 'activo'),
('Platos Fuertes', 'platos-fuertes.jpg', 'activo'),
('Postres', 'postres.jpg', 'activo'),
('Bebidas', 'bebidas.jpg', 'activo');

-- Insertar productos de ejemplo
INSERT INTO res_productos (pro_nombre, pro_descripcion, pro_precio, pro_imagen, cat_id, pro_estado) VALUES
('Ensalada César', 'Lechuga romana, crutones, queso parmesano, aderezo césar', 25000, 'ensalada-cesar.jpg', 1, 'disponible'),
('Pasta Carbonara', 'Pasta con salsa cremosa de huevo, queso parmesano, panceta y pimienta negra', 32000, 'pasta-carbonara.jpg', 2, 'disponible'),
('Tiramisú', 'Postre italiano con capas de bizcocho de soletilla mojados en café y crema de mascarpone', 15000, 'tiramisu.jpg', 3, 'disponible'),
('Limonada Natural', 'Limonada fresca con hojas de hierbabuena', 8000, 'limonada.jpg', 4, 'disponible');
