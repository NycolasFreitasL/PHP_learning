create database funcionarios;
use funcionarios;

create table funcionario(
	id_func int primary key auto_increment,
    nome varchar(255) not null,
	email varchar(255),
    senha varchar(255)
    )
    
