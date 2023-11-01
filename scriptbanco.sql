CREATE DATABASE saguadim;
USE saguadim;

--** CRIAÇÃO DA TABELA DE USUÁRIOS
CREATE TABLE usuarios(
    usu_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usu_login VARCHAR(20) NOT NULL,
    usu_senha VARCHAR(50) NOT NULL,
    usu_status CHAR(1) NOT NULL,
    usu_key VARCHAR(10) NOT NULL
);

--** CRIAÇÃO DA TABELA DE CLIENTE
CREATE TABLE clientes(
    cli_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cli_nome VARCHAR(50) NOT NULL,
    cli_email VARCHAR(100) NOT NULL,
    cli_telefone BIGINT NOT NULL,
    cli_cpf VARCHAR(20) NOT NULL,
    cli_curso VARCHAR(50) NOT NULL,
    cli_sala INT NOT NULL, 
    cli_status CHAR(1) NOT NULL,
    cli_saldo FLOAT(10,2) NOT NULL
);

--** CRIAÇÃO DA TABELA DE PRODUTOS
CREATE TABLE produtos(
    pro_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pro_nome VARCHAR(100) NOT NULL,
    pro_descricao VARCHAR(150) NOT NULL,
    pro_custo DECIMAL(10,2) NOT NULL,
    pro_preco DECIMAL(10,2) NOT NULL,
    pro_quantidade INT NOT NULL,
    pro_validade DATE NOT NULL,
    fk_for_id INT NOT NULL,
    pro_status CHAR(1)
);

--** CRIAÇÃO DA TABELA DE ENCOMENDAS
CREATE TABLE encomendas(
    enc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    enc_emissao DATETIME NOT NULL,
    enc_entrega DATETIME NOT NULL, 
    fk_pro_id INT NOT NULL,
    fk_cli_id INT NOT NULL,
    fk_ven_id INT NOT NULL,
    enc_status CHAR(1) 
)

--** CRIAÇÃO DA TABELA DE VENDAS
CREATE TABLE vendas(
    ven_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ven_data DATETIME NOT NULL,
    fk_cli_id INT NOT NULL,
    ven_total DECIMAL (10,2) NOT NULL,
    fk_iv_codigo VARCHAR(50) NOT NULL
);

--** CRIAÇÃO DA TABELA DE ITEM VENDAS
CREATE TABLE item_venda(
    iv_id INT NOT NULL AUTO_INCREMENT,
    iv_quantidade INT NOT NULL,
    iv_total DECIMAL(10,2)
    iv_codigo VARCHAR(50) NOT NULL PRIMARY KEY
)

--** CRIAÇÃO DA TABELA DE lOG
CREATE TABLE tab_log(
    tab_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tab_query TEXT NOT NULL,
    tab_data DATETIME NOT NULL
);