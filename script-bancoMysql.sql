CREATE DATABASE projeto;

USE projeto;

SELECT * FROM CLIENTES;

CREATE TABLE clientes(
	nome varchar(30) not null,
    nome_fantasia varchar(30),
    cpf_cnpj varchar(25) not null,
    telefone varchar(25) not null,
    email varchar(30) not null,
    PRIMARY KEY(cpf_cnpj)    
);

CREATE TABLE enderecos(
	id_endereco int auto_increment not null,
    id_cliente varchar(25),
    cep varchar(10) not null,
    endereco varchar(50) not null,
    estado varchar(30) not null,
    cidade varchar(30) not null,
    numero varchar(10) not null,
    complemento varchar(30),
    PRIMARY KEY(id_endereco),
    CONSTRAINT fk_id_cliente FOREIGN KEY(id_cliente) REFERENCES clientes(cpf_cnpj)    
);

CREATE TABLE contatos(
	id_contatos int auto_increment not null,
    id_cliente varchar(25),
	nome varchar(30) not null,
    telefone varchar(25),
    email varchar(30),
    PRIMARY KEY(id_contatos),
    CONSTRAINT fk_id_cliente_contatos FOREIGN KEY(id_cliente) REFERENCES clientes(cpf_cnpj)
);