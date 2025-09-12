-- Crear tabla usuarios
CREATE TABLE users (
  id            VARCHAR2(36) PRIMARY KEY,
  email         VARCHAR2(255) UNIQUE NOT NULL,
  password_hash VARCHAR2(255) NOT NULL,
  role          VARCHAR2(30)  CHECK (role IN ('ADMIN','OPERATOR','VIEWER')) NOT NULL,
  created_at    TIMESTAMP DEFAULT SYSTIMESTAMP
);
