create database usuarios_db;
use usuarios_db;

CREATE TABLE usuarios_cad(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,   
    senha VARCHAR(255) NOT NULL,         
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);