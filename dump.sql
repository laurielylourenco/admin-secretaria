DROP DATABASE IF EXISTS admin_secretaria;
CREATE DATABASE admin_secretaria;
USE admin_secretaria;

-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: admin_secretaria
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `admin_secretaria`
--


CREATE USER 'admin'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'qUlH45013{';
GRANT ALL PRIVILEGES ON admin_secretaria.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `admin_secretaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `admin_secretaria`;

--
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alunos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (10,'Breno Silva Costa Matos','1998-07-22','377.869.790-00','bruno.costa@example.com','$2y$10$JG7/YZU3mH3TIzl4MvidYOfE11gtjTmYVkZF4xNJknl30FvKo8Buq','2025-05-24 19:45:50','2025-05-25 00:34:47'),(12,'Daniel Rocha Alves','1997-02-18','272.872.846-18','daniel.alves@example.com','$2y$10$j/a3vP2TLiu1qSb4xpaXKuQ0B4DALwr2IQVGdTv761maqfYpCc2xC','2025-05-24 19:45:50','2025-05-25 15:25:14'),(13,'Eduarda Martins Fonseca','2002-06-10','322.775.162-36','eduarda.fonseca@example.com','$2y$10$abc123fakehashSenha05','2025-05-24 19:45:50','2025-05-25 15:25:02'),(14,'Felipe Gonçalves Dias','1999-09-30','555.704.487-64','felipe.dias@example.com','$2y$10$abc123fakehashSenha06','2025-05-24 19:45:50','2025-05-25 15:25:02'),(15,'Giovana Ribeiro Neves primeia','2003-01-25','587.568.761-49','giovana.neves@example.com','$2y$10$MVhCFP7aueGuzadZmWUo1OGo7xBcuOvQ226c7NIRkGRdbb3yDgBwW','2025-05-24 19:45:50','2025-05-25 15:25:02'),(16,'Henrique Torres Silva','2000-12-12','222.947.660-24','henrique.torres@example.com','$2y$10$abc123fakehashSenha08','2025-05-24 19:45:50','2025-05-25 15:25:02'),(17,'Isa Martins Prado','2001-04-08','277.080.160-02','isabela.prado@example.com','$2y$10$3RQ2ouywN7Sw19hyrJy8P.BrhoZ/KZoCza6BBrZzPEhV7qjZ3HyWm','2025-05-24 19:46:16','2025-05-25 00:35:50'),(18,'João Pedro Vasconcelos','1996-10-03','488.425.284-55','joao.vasconcelos@example.com','$2y$10$abc123fakehashSenha10','2025-05-24 19:46:16','2025-05-25 15:25:02'),(19,'Kauã  Batista','2000-05-20','487.875.070-72','kaua.batista1@example.com','$2y$10$c.eZR3FovZFfxRA.4f8s/uOsLqbszmhpfIl12taTFdMNQSz1o4kte','2025-05-24 19:46:16','2025-05-25 15:25:03'),(20,'Larissa Fernandes Rocha','1999-12-01','828.497.317-06','larissa.rocha@example.com','$2y$10$abc123fakehashSenha12','2025-05-24 19:46:16','2025-05-25 15:25:03'),(21,'Mateus Henrique Soares','2002-03-14','726.545.059-01','mateus.soares@example.com','$2y$10$abc123fakehashSenha13','2025-05-24 19:46:16','2025-05-25 15:25:03'),(22,'Natália Castro Ribeiro','2001-07-17','792.281.213-27','natalia.ribeiro@example.com','$2y$10$abc123fakehashSenha14','2025-05-24 19:46:16','2025-05-25 15:25:03'),(24,'Paula Regina Mendes','1997-08-23','031.306.884-47','paula.mendes@example.com','$2y$10$abc123fakehashSenha16','2025-05-24 19:46:16','2025-05-25 15:25:03'),(25,'Rafael Antunes Braga','1995-11-11','317.114.330-55','rafael.braga@example.com','$2y$10$abc123fakehashSenha17','2025-05-24 19:46:16','2025-05-25 15:25:03'),(26,'Sofia Lima Barreto','2003-09-06','849.472.664-14','sofia.barreto@example.com','$2y$10$Z32DqxoyPUrlrVtiwijSquDjx9CgBS2dN0kZPKRV4eykA.vTylNxG','2025-05-24 19:46:16','2025-05-25 15:25:22'),(27,'LAURIELY SAMIRA LOURENCO DA SILVA','2002-01-07','150.978.456-09','laurielylourenco@gmail.com','$2y$10$Rotmjz6taxRKZNRZXmAGYeYeTj51JIiB0INNn.7dYYyRU1U5HSqAS','2025-05-24 21:48:06','2025-05-24 21:48:06'),(28,'Francisca Gabriela Costa','2001-02-02','890.618.166-37','frasncia@gmail.com','$2y$10$uDSJMBRTB9nO5/e.vAfhle2i90YmwGEKZkgct6ujtL8FJA8EZ34Lq','2025-05-24 22:19:24','2025-05-24 22:19:24');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matriculas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aluno_id` int NOT NULL,
  `turma_id` int NOT NULL,
  `data_matricula` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_aluno_turma_unique` (`aluno_id`,`turma_id`),
  KEY `fk_matriculas_aluno_idx` (`aluno_id`),
  KEY `fk_matriculas_turma_idx` (`turma_id`),
  CONSTRAINT `fk_matriculas_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_matriculas_turma` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (2,12,31,'2025-05-25 03:00:00'),(4,22,35,'2025-05-25 03:00:00'),(5,21,32,'2025-05-25 03:00:00');
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turmas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (15,'Turma de Matemática Avançada','Curso voltado para alunos com interesse em álgebra, cálculo e geometria.'),(16,'Turma de Programação Web','Introdução ao desenvolvimento de sites usando HTML, CSS, JavaScript e PHP.'),(17,'Turma de Inglês Intermediário','Foco na conversação e leitura de textos em inglês.'),(18,'Turma de Robótica Iniciante','Estudo de robôs com kits Lego Mindstorms e Arduíno.'),(19,'Turma de Física Experimental','Aprendizado por meio de experimentos em laboratório.'),(20,'Turma de Química Orgânica','Estudo aprofundado de cadeias carbônicas e reações orgânicas.'),(21,'Turma de Biologia Celular','Foco em estruturas e funções das células humanas.'),(22,'Turma de História do Brasil','Análise dos principais eventos históricos do país.'),(23,'Turma de Geografia Política','Estudo dos blocos econômicos e geopolítica mundial.'),(24,'Turma de Literatura Brasileira','Leitura e interpretação de autores clássicos e contemporâneos.'),(25,'Turma de Redação ENEM','Aulas práticas para desenvolver redações com temas sociais.'),(26,'Turma de Lógica de Programação','Conceitos básicos de algoritmos e estruturas de controle.'),(28,'Turma de Educação Física','Práticas esportivas e teoria do movimento humano.'),(29,'Turma de Empreendedorismo','Como montar e gerenciar pequenos negócios.'),(30,'Turma de Design Gráfico','Fundamentos de design visual e uso do Photoshop e Canva.'),(31,'Turma de Cidadania','Discussões sobre direitos, deveres e valores sociais.'),(32,'Turma de Projeto Integrador','Turma voltada para desenvolvimento de projetos interdisciplinares.'),(33,'Turma de Inteligência Artificial','Introdução à IA, aprendizado de máquina e redes neurais.'),(34,'Turma de Ciências Sociais','Estudo das relações humanas e estruturas sociais.'),(35,'Turma de Calculo 1','Foco aprender base matematica avançada '),(36,'Turma de Banco de Dados','Modelo relacional, SQL e boas práticas de modelagem.');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'user','user@teste.com','$2y$10$JZUvA.wFLVICatTiqB4YSOOtfk8OqDO9L5eL/wUBHY9N64sazGXXG');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-25 12:34:51