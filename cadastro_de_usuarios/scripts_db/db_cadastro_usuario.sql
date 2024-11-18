CREATE DATABASE IF NOT EXISTS db_cadastro_usuario
COLLATE utf8mb4_general_ci CHARSET utf8mb4;

USE db_cadastro_usuario;

CREATE TABLE IF NOT EXISTS tb_estado(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
)AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS tb_endereco(
	id INT PRIMARY KEY AUTO_INCREMENT,
    cidade VARCHAR(100) NOT NULL,
    cep CHAR(8) NOT NULL,
    id_estado INT,
    
	CONSTRAINT fk_id_estado_endereco FOREIGN KEY (id_estado) REFERENCES tb_estado(id)
)AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS tb_usuario(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf CHAR(11) NOT NULL,
    sexo VARCHAR(15) NOT NULL,
    data_nascimento DATE NOT NULL,
    senha VARCHAR(45) NOT NULL,
    id_endereco INT,
    
    CONSTRAINT fk_id_endereco_usuario FOREIGN KEY (id_endereco) REFERENCES tb_endereco(id),
    CONSTRAINT uq_cpf UNIQUE (cpf),
    CONSTRAINT uq_email UNIQUE (email)
)AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS tb_telefone(
	id INT PRIMARY KEY AUTO_INCREMENT,
    numero CHAR(11) NOT NULL,
	id_usuario INT,
    
    CONSTRAINT fk_id_usuario_telefone FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id)
)AUTO_INCREMENT = 1;

/*DROP DATABASE db_cadastro_usuario;*/



SELECT 
    u.id AS id_usuario,
    u.nome AS nome_usuario,
    u.email,
    u.cpf,
    u.sexo,
    u.data_nascimento,
    u.senha,
    e.cidade,
    e.cep,
    es.nome AS nome_estado,
    t.numero AS telefone
FROM 
    tb_usuario AS u
JOIN 
    tb_endereco AS e ON u.id_endereco = e.id
JOIN 
    tb_estado AS es ON e.id_estado = es.id
LEFT JOIN 
    tb_telefone AS t ON u.id = t.id_usuario;
    
SELECT * FROM tb_usuario;

-- Inserindo Estados na tabela tb_estado
INSERT INTO tb_estado (nome) VALUES 
('São Paulo'),
('Rio de Janeiro'),
('Minas Gerais');

-- Inserindo Endereços na tabela tb_endereco
INSERT INTO tb_endereco (cidade, cep, id_estado) VALUES 
('São Paulo', '01001000', 1),
('Rio de Janeiro', '20040002', 2),
('Belo Horizonte', '30120010', 3);

-- Inserindo Usuários na tabela tb_usuario
INSERT INTO tb_usuario (nome, email, cpf, sexo, data_nascimento, senha, id_endereco) VALUES 
('Carlos Silva', 'carlos.silva@email.com', '12345678901', 'Masculino', '1990-05-10', 'senha123', 1),
('Ana Oliveira', 'ana.oliveira@email.com', '23456789012', 'Feminino', '1985-03-15', 'senha456', 2),
('Mariana Santos', 'mariana.santos@email.com', '34567890123', 'Feminino', '1992-07-20', 'senha789', 3);

-- Inserindo Telefones na tabela tb_telefone
INSERT INTO tb_telefone (numero, id_usuario) VALUES 
('11987654321', 1),
('21998765432', 2),
('31987654321', 3);

