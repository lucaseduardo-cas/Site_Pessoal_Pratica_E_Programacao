-- Criação do banco de dados
CREATE DATABASE site_pessoal;

-- Uso do banco de dados
USE site_pessoal;

-- Tabela para o portfólio
CREATE TABLE portfolio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ano YEAR NOT NULL,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL
);

-- Inserção de dados na tabela portfólio
INSERT INTO portfolio (ano, nome, descricao)
VALUES 
(2023, 'Website Pessoal', 'Um site pessoal desenvolvido em PHP com banco de dados.'),
(2022, 'E-commerce Simples', 'Plataforma de vendas online com funcionalidades básicas.'),
(2023, 'Dashboard Administrativo', 'Painel de controle com gráficos e estatísticas usando Chart.js e PHP'),
(2022, 'Sistema de Chamados', 'Plataforma de gerenciamento de tickets para suporte técnico com autenticação e níveis de usuário'),
(2021, 'Aplicativo de Tarefas', 'Aplicação web para organização de tarefas diárias.');

-- Tabela para os contatos
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(15),
    mensagem TEXT NOT NULL
);
