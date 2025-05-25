


CREATE USER 'admin'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'qUlH45013{';
GRANT ALL PRIVILEGES ON seu_banco.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;


CREATE DATABASE admin_secretaria;

USE admin_secretaria;
 
CREATE TABLE usuarios (id INT AUTO_INCREMENT PRIMARY KEY,nome VARCHAR(100) NOT NULL,email VARCHAR(100) NOT NULL UNIQUE,senha VARCHAR(255) NOT NULL);


CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE turmas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);


CREATE TABLE `matriculas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aluno_id` INT NOT NULL,
  `turma_id` INT NOT NULL,
  `data_matricula` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_matriculas_aluno_idx` (`aluno_id` ASC),
  INDEX `fk_matriculas_turma_idx` (`turma_id` ASC),
  UNIQUE KEY `idx_aluno_turma_unique` (`aluno_id`, `turma_id`), 
  CONSTRAINT `fk_matriculas_aluno`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `admin_secretaria`.`alunos` (`id`)
    ON DELETE CASCADE 
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_turma`
    FOREIGN KEY (`turma_id`)
    REFERENCES `admin_secretaria`.`turmas` (`id`)
    ON DELETE CASCADE 
    ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;