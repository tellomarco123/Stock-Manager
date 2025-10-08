
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `rol_usuario` enum('Superadmin','Admin','Usuario') NOT NULL DEFAULT 'Usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_matricula`);

ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

