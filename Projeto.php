<?php //Apenas para envio(GitHub)

CREATE DATABASE assistencia;

CREATE TABLE Recepcionista (

id_recepcionista INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
cpf VARCHAR(14) NOT NULL COMMENT 'formato: 000.000.000-00',
rg VARCHAR(15) NOT NULL COMMENT 'formato: 00000000-0',
endereco VARCHAR(45) NOT NULL,
telefone VARCHAR(16) NOT NULL COMMENT 'formato: +55 85 xxxx-xxxx',
horario DATETIME NOT NULL COMMENT 'formato: 0000-00-00 00:00:00',
login VARCHAR(45) NOT NULL,
senha VARCHAR(45) NOT NULL);

CREATE TABLE Hospede (
id_hospede INT AUTO_INCREMENT NOT NULL UNIQUE PRIMARY KEY,
nome VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL,
cpf VARCHAR(14) NOT NULL COMMENT 'formato: 000.000.000-00',
rg VARCHAR(15) NOT NULL COMMENT 'formato: 00000000-0',
endereço VARCHAR(45) NOT NULL,
telefone VARCHAR(16) NOT NULL COMMENT 'formato: +55 85 xxxx-xxxx',
horario DATETIME NOT NULL COMMENT 'formato: 0000-00-00 00:00:00',
login VARCHAR(45) NOT NULL,
senha VARCHAR(45) NOT NULL);

CREATE TABLE Gerente (
id_gerente INT AUTO_INCREMENT NOT NULL UNIQUE PRIMARY KEY,
nome VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL,
cpf VARCHAR(14) NOT NULL COMMENT 'formato: 000.000.000-00',
endereço VARCHAR(45) NOT NULL,
telefone VARCHAR(16) NOT NULL COMMENT 'formato: +55 85 xxxx-xxxx',
login VARCHAR(45) NOT NULL,
senha VARCHAR(45) NOT NULL);

CREATE TABLE Administrador (
id_administrador INT AUTO_INCREMENT NOT NULL UNIQUE PRIMARY KEY,
login VARCHAR(45) NOT NULL,
senha VARCHAR(45) NOT NULL);

CREATE TABLE Checkin (
id_recepcionista_checkin INT NOT NULL,
id_hospede_checkin INT NOT NULL,
id_quarto INT NOT NULL,
dia_registro DATETIME NOT NULL COMMENT 'Dia que o hospede se registrou no
hotel',
fim_periodo DATETIME NOT NULL COMMENT 'Fim da hospedagem');

CREATE TABLE Quarto (
id_quarto INT NOT NULL PRIMARY KEY,
tipo VARCHAR(20) NOT NULL,
tamanho_quarto VARCHAR(20) NOT NULL COMMENT 'formato: 000,00 m2',
andar_quarto VARCHAR(20) NOT NULL COMMENT 'formato: 00° andar',
numero_porta VARCHAR(20) NOT NULL COMMENT 'formato: 000 - 00° andar');

ALTER TABLE Checkin ADD CONSTRAINT
Checkin_id_recepcionista_checkin_Recepcionista_id_recepcionista FOREIGN KEY
(id_recepcionista_checkin) REFERENCES Recepcionista(id_recepcionista);
ALTER TABLE Checkin ADD CONSTRAINT
Checkin_id_hospede_checkin_Hospede_id_hospede FOREIGN KEY
(id_hospede_checkin) REFERENCES Hospede(id_hospede);
ALTER TABLE Checkin ADD CONSTRAINT Checkin_id_quarto_Quarto_id_quarto
FOREIGN KEY (id_quarto) REFERENCES Quarto(id_quarto);

?>