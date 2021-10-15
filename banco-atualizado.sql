-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.4.14-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para agro_imob
CREATE DATABASE IF NOT EXISTS `agro_imob` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `agro_imob`;

-- Copiando estrutura para tabela agro_imob.animal
CREATE TABLE IF NOT EXISTS `animal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `idade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacinacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalidade_tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destaque` int(11) DEFAULT NULL,
  `lactacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `observacoes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.animal: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` (`id`, `codigo_animal`, `categoria_animal`, `raca`, `data_nascimento`, `idade`, `peso`, `sexo`, `pelagem`, `vacinacao`, `criacao`, `tipo_animal`, `finalidade`, `finalidade_tipo`, `destaque`, `lactacao`, `qtd`, `valor_unitario`, `observacoes`, `imagem`, `url_video`, `status`, `begin_date`, `end_date`, `created_at`, `updated_at`) VALUES
	(10, 'dasdas', 'Gado', 'Quarto de milha', '2021-06-07', '23', '23e323', 'Macho', 'asasxas', 'Sim', 'Haras', 'Reprodutor', 'Leitero', 'Compra', 1, '23333', '1', 250.00, NULL, 'animal/\\/photo_1623300829.webp', '', 1, '2021-06-07 21:31:28', NULL, '2021-06-08 00:31:28', '2021-06-15 01:09:15'),
	(11, '454654', 'Equinos', 'Quarto de milha', NULL, '5', NULL, 'Macho', NULL, 'Sim', 'Haras', 'Matriz', NULL, 'À Venda', 1, NULL, NULL, 0.00, NULL, 'animal/\\/photo_1623301024.webp', '', 1, '2021-06-10 01:57:05', NULL, '2021-06-10 04:57:05', '2021-06-10 07:58:30'),
	(12, '564878', 'Equinos', 'Quarto de milha', NULL, '3', NULL, 'Fêmea', NULL, 'Sim', 'Fazenda', 'Reprodutor', NULL, 'À Venda', 1, NULL, NULL, 0.00, NULL, 'animal/\\/photo_1623301074.webp', '', 1, '2021-06-10 01:57:55', NULL, '2021-06-10 04:57:55', '2021-06-10 07:59:11'),
	(13, '525484', 'Gado', 'Quarto de milha', NULL, '2', NULL, 'Macho', NULL, 'Sim', 'Fazenda', 'Matriz', NULL, 'À Venda', 1, NULL, NULL, 0.00, NULL, 'animal/\\/photo_1623301226.webp', '', 1, '2021-06-10 02:00:26', NULL, '2021-06-10 05:00:26', '2021-06-10 08:00:54'),
	(14, '659874', 'Gado', 'Quarto de milha', NULL, '6', NULL, 'Macho', NULL, 'Sim', 'Fazenda', 'Matriz', NULL, 'À Venda', 1, NULL, NULL, 0.00, NULL, 'animal/\\/photo_1623301363.webp', '', 1, '2021-06-10 02:02:43', NULL, '2021-06-10 05:02:43', '2021-06-10 08:03:07'),
	(15, '658478', 'Equinos', 'Quarto de milha', NULL, '5', NULL, 'Fêmea', NULL, 'Sim', 'Haras', 'Matriz', NULL, 'À Venda', 1, NULL, NULL, 0.00, NULL, 'animal/\\/photo_1623301451.webp', '', 1, '2021-06-10 02:04:12', NULL, '2021-06-10 05:04:12', '2021-06-10 08:04:42');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_page` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.banners: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `title`, `imagem`, `url`, `target_page`, `status`, `begin_date`, `end_date`, `created_at`, `updated_at`) VALUES
	(9, 'ENCONTRE AQUI O TERRENO DOS SEUS SONHOS', 'banner/\\/photo_1623278994.webp', NULL, 0, 1, '2021-06-05 18:51:51', NULL, '2021-06-05 21:51:51', '2021-06-10 01:58:27');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.banner_animal
CREATE TABLE IF NOT EXISTS `banner_animal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.banner_animal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banner_animal` DISABLE KEYS */;
INSERT INTO `banner_animal` (`id`, `title`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Animais', 'bannerAnimal/\\/photo_1623211604.webp', '2021-06-09 04:04:39', '2021-06-09 07:09:34');
/*!40000 ALTER TABLE `banner_animal` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.banner_blog
CREATE TABLE IF NOT EXISTS `banner_blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.banner_blog: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banner_blog` DISABLE KEYS */;
INSERT INTO `banner_blog` (`id`, `title`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Blog', 'bannerBlog/\\/photo_1623211970.webp', '2021-06-09 04:04:50', '2021-06-09 07:12:51');
/*!40000 ALTER TABLE `banner_blog` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.banner_equipamento
CREATE TABLE IF NOT EXISTS `banner_equipamento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.banner_equipamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banner_equipamento` DISABLE KEYS */;
INSERT INTO `banner_equipamento` (`id`, `title`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Equipamentos', 'bannerEquipamento/\\/photo_1623211891.webp', '2021-06-09 04:05:02', '2021-06-09 07:11:32');
/*!40000 ALTER TABLE `banner_equipamento` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.banner_institucional
CREATE TABLE IF NOT EXISTS `banner_institucional` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.banner_institucional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banner_institucional` DISABLE KEYS */;
INSERT INTO `banner_institucional` (`id`, `title`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'QUEM SOMOS', 'bannerInstitucional/\\/photo_1623293340.webp', '2021-06-04 01:57:07', '2021-06-10 05:49:01');
/*!40000 ALTER TABLE `banner_institucional` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.banner_terreno
CREATE TABLE IF NOT EXISTS `banner_terreno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.banner_terreno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banner_terreno` DISABLE KEYS */;
INSERT INTO `banner_terreno` (`id`, `title`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Imóveis', 'bannerTerreno/\\/photo_1623211720.webp', '2021-06-09 04:05:14', '2021-06-09 07:09:11');
/*!40000 ALTER TABLE `banner_terreno` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destaque` int(11) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.blog: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `title`, `text`, `destaque`, `imagem`, `status`, `begin_date`, `end_date`, `created_at`, `updated_at`, `url_video`) VALUES
	(12, 'Teste', '<p>Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste&nbsp;</p>', 1, 'blog/\\/photo_1623302162.webp', 1, '2021-06-09 02:04:06', NULL, '2021-06-09 05:04:06', '2021-06-11 02:24:16', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23'),
	(19, 'Teste', '<div>\r\n<div>Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste&nbsp;</div>\r\n</div>', 1, 'blog/\\/photo_1623302287.webp', 1, '2021-06-09 02:04:06', NULL, '2021-06-09 05:04:06', '2021-06-10 08:18:08', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23'),
	(20, 'Teste', '<div>\r\n<div>Teste teste Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste &nbsp;Teste teste&nbsp;</div>\r\n</div>', 1, 'blog/\\/photo_1623302332.webp', 1, '2021-06-09 02:04:06', NULL, '2021-06-09 05:04:06', '2021-06-10 08:18:53', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.categoria_animal
CREATE TABLE IF NOT EXISTS `categoria_animal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.categoria_animal: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_animal` DISABLE KEYS */;
INSERT INTO `categoria_animal` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(1, 'Gado', '2021-06-06 00:15:07', '2021-06-06 02:28:03'),
	(3, 'Equinos', '2021-06-06 02:27:42', '2021-06-06 02:27:42');
/*!40000 ALTER TABLE `categoria_animal` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.categoria_blog
CREATE TABLE IF NOT EXISTS `categoria_blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.categoria_blog: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_blog` DISABLE KEYS */;
INSERT INTO `categoria_blog` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(4, 'Animais', '2021-06-09 07:20:29', '2021-06-09 07:20:29'),
	(5, 'Imóveis', '2021-06-09 07:21:23', '2021-06-09 07:21:23'),
	(6, 'Equipamentos', '2021-06-09 07:21:34', '2021-06-09 07:21:34');
/*!40000 ALTER TABLE `categoria_blog` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.empresa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`id`, `nome`, `email`, `whatsapp`, `endereco`, `cidade`, `instagram`, `facebook`, `youtube`, `linkedIn`, `created_at`, `updated_at`) VALUES
	(1, 'Agro Solutions', 'atendimento@agrosolutions.com.br', '(62) 98569-3652', 'Rua 259, N.º 40, Sala 705/776 Ed. Premier, N.º 40, Sala 705/776 Ed. Premier - Alto da Glória Goiânia – GO - CEP: 74.255-470', 'Goiânia', 'https://www.instagram.com', 'https://www.facebook.com', 'https://www.youtube.com', 'https://www.linkedIn.com', '2021-05-11 01:41:43', '2021-06-10 04:49:48');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.equipamento
CREATE TABLE IF NOT EXISTS `equipamento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_equipamento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_fabricacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tamanho` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtd_linhas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destaque` int(11) DEFAULT NULL,
  `finalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.equipamento: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `equipamento` DISABLE KEYS */;
INSERT INTO `equipamento` (`id`, `codigo_equipamento`, `nome`, `marca`, `modelo`, `ano_fabricacao`, `tamanho`, `capacidade`, `qtd_linhas`, `observacoes`, `destaque`, `finalidade`, `valor`, `imagem`, `status`, `begin_date`, `end_date`, `created_at`, `updated_at`, `url_video`) VALUES
	(14, '252416', 'Trator Beachut', 'John Deere', 'VHR', '2015', NULL, NULL, NULL, NULL, 1, 'Venda', 200000.00, 'equipamento/\\/photo_1623299663.webp', 1, '2021-06-10 01:34:25', NULL, '2021-06-10 04:34:25', '2021-06-10 04:34:25', NULL),
	(16, '254685', 'Titan Trator', 'John Deere', 'STZ', '2018', NULL, NULL, NULL, NULL, 1, 'Venda', 350000.00, 'equipamento/\\/photo_1623299936.webp', 1, '2021-06-10 01:38:57', NULL, '2021-06-10 04:38:57', '2021-06-10 04:38:57', NULL),
	(17, '65897', 'Trator Teacher', 'John Deere', 'RVH', '2017', NULL, NULL, NULL, NULL, 1, 'Venda', 270000.00, 'equipamento/\\/photo_1623300327.webp', 1, '2021-06-10 01:45:27', NULL, '2021-06-10 04:45:27', '2021-06-10 07:45:55', NULL),
	(18, '215478', 'Colheitadeira RGS67T', 'John Deere', 'CT09V', '2018', NULL, NULL, NULL, NULL, 1, 'Venda', 500000.00, 'equipamento/\\/photo_1623300435.webp', 1, '2021-06-10 01:47:16', NULL, '2021-06-10 04:47:16', '2021-06-10 07:47:40', NULL),
	(19, '854789', 'Plantadeira Ghtrs', 'John Deere', 'VTS', '2015', NULL, NULL, NULL, NULL, 1, 'Venda', 450000.00, 'equipamento/\\/photo_1623300546.webp', 1, '2021-06-10 01:49:06', NULL, '2021-06-10 04:49:06', '2021-06-10 07:49:30', NULL),
	(20, '524587', 'Grade Venus', 'John Deere', 'Jhuuper', '2012', NULL, NULL, NULL, NULL, 1, 'Venda', 50000.00, 'equipamento/\\/photo_1623300652.webp', 1, '2021-06-10 01:50:53', NULL, '2021-06-10 04:50:53', '2021-06-10 07:51:13', NULL);
/*!40000 ALTER TABLE `equipamento` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.frase_rodape
CREATE TABLE IF NOT EXISTS `frase_rodape` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.frase_rodape: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `frase_rodape` DISABLE KEYS */;
INSERT INTO `frase_rodape` (`id`, `title`, `second_title`, `link`, `created_at`, `updated_at`) VALUES
	(1, 'Encontre aqui o Terreno dos seus sonhos', 'Tudo sobre o agro, encontre a oportunidade dos seus sonhos', 'http://127.0.0.1:8000/institucional', '2021-06-09 05:13:59', '2021-06-10 04:41:27');
/*!40000 ALTER TABLE `frase_rodape` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.galleria_animal
CREATE TABLE IF NOT EXISTS `galleria_animal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_animal` int(11) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.galleria_animal: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `galleria_animal` DISABLE KEYS */;
INSERT INTO `galleria_animal` (`id`, `id_animal`, `imagem`, `created_at`, `updated_at`) VALUES
	(14, 10, 'animal/10/\\/photo_1623300844590.webp', '2021-06-10 07:54:05', '2021-06-10 07:54:05'),
	(15, 10, 'animal/10/\\/photo_162330085910.webp', '2021-06-10 07:54:20', '2021-06-10 07:54:20'),
	(16, 10, 'animal/10/\\/photo_1623300866350.webp', '2021-06-10 07:54:27', '2021-06-10 07:54:27'),
	(17, 10, 'animal/10/\\/photo_1623300872530.webp', '2021-06-10 07:54:32', '2021-06-10 07:54:32'),
	(18, 10, 'animal/10/\\/photo_1623300877330.webp', '2021-06-10 07:54:38', '2021-06-10 07:54:38'),
	(25, 11, 'animal/11/\\/photo_1623301094390.webp', '2021-06-10 07:58:14', '2021-06-10 07:58:14'),
	(26, 11, 'animal/11/\\/photo_1623301098840.webp', '2021-06-10 07:58:19', '2021-06-10 07:58:19'),
	(27, 11, 'animal/11/\\/photo_1623301102440.webp', '2021-06-10 07:58:22', '2021-06-10 07:58:22'),
	(28, 11, 'animal/11/\\/photo_1623301109320.webp', '2021-06-10 07:58:30', '2021-06-10 07:58:30'),
	(29, 12, 'animal/12/\\/photo_1623301132900.webp', '2021-06-10 07:58:53', '2021-06-10 07:58:53'),
	(30, 12, 'animal/12/\\/photo_1623301138220.webp', '2021-06-10 07:58:59', '2021-06-10 07:58:59'),
	(31, 12, 'animal/12/\\/photo_1623301143750.webp', '2021-06-10 07:59:04', '2021-06-10 07:59:04'),
	(32, 12, 'animal/12/\\/photo_1623301149660.webp', '2021-06-10 07:59:10', '2021-06-10 07:59:10'),
	(33, 13, 'animal/13/\\/photo_1623301239750.webp', '2021-06-10 08:00:39', '2021-06-10 08:00:39'),
	(34, 13, 'animal/13/\\/photo_1623301245760.webp', '2021-06-10 08:00:45', '2021-06-10 08:00:45'),
	(35, 13, 'animal/13/\\/photo_162330125180.webp', '2021-06-10 08:00:52', '2021-06-10 08:00:52'),
	(36, 14, 'animal/14/\\/photo_1623301376210.webp', '2021-06-10 08:02:56', '2021-06-10 08:02:56'),
	(37, 14, 'animal/14/\\/photo_162330138030.webp', '2021-06-10 08:03:00', '2021-06-10 08:03:00'),
	(38, 15, 'animal/15/\\/photo_1623301462320.webp', '2021-06-10 08:04:23', '2021-06-10 08:04:23'),
	(39, 15, 'animal/15/\\/photo_1623301468780.webp', '2021-06-10 08:04:29', '2021-06-10 08:04:29'),
	(40, 15, 'animal/15/\\/photo_1623301472150.webp', '2021-06-10 08:04:33', '2021-06-10 08:04:33'),
	(41, 15, 'animal/15/\\/photo_1623301477730.webp', '2021-06-10 08:04:38', '2021-06-10 08:04:38'),
	(42, 15, 'animal/15/\\/photo_1623301480200.webp', '2021-06-10 08:04:41', '2021-06-10 08:04:41');
/*!40000 ALTER TABLE `galleria_animal` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.galleria_blog
CREATE TABLE IF NOT EXISTS `galleria_blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_blog` int(11) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.galleria_blog: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `galleria_blog` DISABLE KEYS */;
INSERT INTO `galleria_blog` (`id`, `id_blog`, `imagem`, `created_at`, `updated_at`) VALUES
	(18, 12, 'blog/12/\\/photo_1623302043930.webp', '2021-06-10 08:14:04', '2021-06-10 08:14:04'),
	(19, 12, 'blog/12/\\/photo_1623302048950.webp', '2021-06-10 08:14:08', '2021-06-10 08:14:08');
/*!40000 ALTER TABLE `galleria_blog` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.galleria_equipamento
CREATE TABLE IF NOT EXISTS `galleria_equipamento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_equipamento` int(11) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.galleria_equipamento: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `galleria_equipamento` DISABLE KEYS */;
INSERT INTO `galleria_equipamento` (`id`, `id_equipamento`, `imagem`, `created_at`, `updated_at`) VALUES
	(9, 4, 'animal/4/\\/photo_162320720370.webp', '2021-06-09 05:53:23', '2021-06-09 05:53:23'),
	(20, 17, 'equipamento/17/\\/photo_1623300346480.webp', '2021-06-10 07:45:47', '2021-06-10 07:45:47'),
	(21, 17, 'equipamento/17/\\/photo_1623300353140.webp', '2021-06-10 07:45:53', '2021-06-10 07:45:53'),
	(22, 18, 'equipamento/18/\\/photo_162330045020.webp', '2021-06-10 07:47:30', '2021-06-10 07:47:30'),
	(23, 18, 'equipamento/18/\\/photo_1623300457890.webp', '2021-06-10 07:47:38', '2021-06-10 07:47:38'),
	(24, 19, 'equipamento/19/\\/photo_1623300562620.webp', '2021-06-10 07:49:22', '2021-06-10 07:49:22'),
	(25, 19, 'equipamento/19/\\/photo_1623300568700.webp', '2021-06-10 07:49:28', '2021-06-10 07:49:28'),
	(26, 20, 'equipamento/20/\\/photo_1623300665920.webp', '2021-06-10 07:51:06', '2021-06-10 07:51:06'),
	(27, 20, 'equipamento/20/\\/photo_1623300671840.webp', '2021-06-10 07:51:12', '2021-06-10 07:51:12');
/*!40000 ALTER TABLE `galleria_equipamento` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.galleria_fotos
CREATE TABLE IF NOT EXISTS `galleria_fotos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.galleria_fotos: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `galleria_fotos` DISABLE KEYS */;
INSERT INTO `galleria_fotos` (`id`, `id_imovel`, `imagem`, `created_at`, `updated_at`) VALUES
	(9, 1, 'terreno/1/\\/photo_1623295682660.webp', '2021-06-10 06:28:02', '2021-06-10 06:28:02'),
	(11, 1, 'terreno/1/\\/photo_1623295682812.webp', '2021-06-10 06:28:02', '2021-06-10 06:28:02'),
	(12, 1, 'terreno/1/\\/photo_1623296326420.webp', '2021-06-10 06:38:46', '2021-06-10 06:38:46'),
	(13, 1, 'terreno/1/\\/photo_1623296326421.webp', '2021-06-10 06:38:47', '2021-06-10 06:38:47'),
	(14, 1, 'terreno/1/\\/photo_1623296327932.webp', '2021-06-10 06:38:48', '2021-06-10 06:38:48'),
	(15, 13, 'terreno/13/\\/photo_1623301533410.webp', '2021-06-10 08:05:33', '2021-06-10 08:05:33'),
	(16, 13, 'terreno/13/\\/photo_162330153860.webp', '2021-06-10 08:05:38', '2021-06-10 08:05:38'),
	(17, 13, 'terreno/13/\\/photo_1623301550480.webp', '2021-06-10 08:05:50', '2021-06-10 08:05:50'),
	(18, 13, 'terreno/13/\\/photo_162330155820.webp', '2021-06-10 08:05:59', '2021-06-10 08:05:59'),
	(19, 5, 'terreno/5/\\/photo_1623301595520.webp', '2021-06-10 08:06:35', '2021-06-10 08:06:35'),
	(20, 5, 'terreno/5/\\/photo_1623301598220.webp', '2021-06-10 08:06:39', '2021-06-10 08:06:39'),
	(21, 5, 'terreno/5/\\/photo_1623301604520.webp', '2021-06-10 08:06:44', '2021-06-10 08:06:44'),
	(22, 4, 'terreno/4/\\/photo_162330163160.webp', '2021-06-10 08:07:11', '2021-06-10 08:07:11'),
	(23, 4, 'terreno/4/\\/photo_1623301636600.webp', '2021-06-10 08:07:16', '2021-06-10 08:07:16'),
	(24, 4, 'terreno/4/\\/photo_1623301639430.webp', '2021-06-10 08:07:19', '2021-06-10 08:07:19'),
	(25, 14, 'terreno/14/\\/photo_1623301718280.webp', '2021-06-10 08:08:38', '2021-06-10 08:08:38'),
	(26, 14, 'terreno/14/\\/photo_1623301722820.webp', '2021-06-10 08:08:42', '2021-06-10 08:08:42'),
	(27, 15, 'terreno/15/\\/photo_162330182120.webp', '2021-06-10 08:10:21', '2021-06-10 08:10:21'),
	(28, 15, 'terreno/15/\\/photo_162330182770.webp', '2021-06-10 08:10:27', '2021-06-10 08:10:27'),
	(29, 15, 'terreno/15/\\/photo_1623301831590.webp', '2021-06-10 08:10:31', '2021-06-10 08:10:31');
/*!40000 ALTER TABLE `galleria_fotos` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.galleria_instalacoes
CREATE TABLE IF NOT EXISTS `galleria_instalacoes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.galleria_instalacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `galleria_instalacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleria_instalacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.imoveis
CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_imovel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tamanho_hectares` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_hectare` decimal(10,2) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `tipo_solo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aptidao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_imovel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_negociacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `infra_fazenda` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destaque` int(11) DEFAULT NULL,
  `aguadas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.imoveis: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `imoveis` DISABLE KEYS */;
INSERT INTO `imoveis` (`id`, `codigo_imovel`, `tamanho_hectares`, `valor_hectare`, `valor`, `tipo_solo`, `endereco`, `aptidao`, `tipo_imovel`, `tipo_negociacao`, `finalidade`, `infra_fazenda`, `cidade_estado`, `imagem`, `destaque`, `aguadas`, `observacoes`, `status`, `begin_date`, `end_date`, `created_at`, `updated_at`, `url_video`) VALUES
	(1, '987', '2000³', 20.00, 0.00, 'preto', 'rua', 'Pecuária', 'Chácara', 'Permuta', 'Compra', '<p>Teste</p>', 'Jardins Valência - Goiânia', 'terreno/\\/photo_1623295568.webp', 1, 'Artificial', '<p>Tesrsdas obs</p>', 1, '2021-06-05 15:59:24', NULL, '2021-06-05 18:59:24', '2021-06-10 06:58:27', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23'),
	(4, '324', 'tamanho', 0.00, 1500000.00, 'preto', 'rua', NULL, 'Fazenda', NULL, 'À Venda', '<p>Teste</p>', 'Jardins Valência - Goiânia', 'terreno/\\/photo_1623295590.webp', 1, NULL, '<p>Tesrsdas obs</p>', 1, '2021-06-05 15:59:24', NULL, '2021-06-05 18:59:24', '2021-06-10 08:07:21', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23'),
	(5, '32', 'tamanho', 0.00, 1500000.00, 'preto', 'rua', NULL, 'Sítio', NULL, 'Arrendamento', '<p>Teste</p>', 'Jardins Valência - Goiânia', 'terreno/\\/photo_1623295611.webp', 1, NULL, '<p>Tesrsdas obs</p>', 1, '2021-06-05 15:59:24', NULL, '2021-06-05 18:59:24', '2021-06-10 08:06:45', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23'),
	(13, '32', 'tamanho', 0.00, 1500000.00, 'preto', 'rua', NULL, 'Sítio', NULL, 'Arrendamento', '<p>Teste</p>', 'Jardins Valência - Goiânia', 'terreno/\\/photo_1623295631.webp', 1, NULL, '<p>Tesrsdas obs</p>', 1, '2021-06-05 15:59:24', NULL, '2021-06-05 18:59:24', '2021-06-10 08:06:00', 'https://www.youtube.com/watch?v=bvltaWCxFl0&list=RDMM&index=23'),
	(14, '487844', NULL, 0.00, 0.00, NULL, 'Goiania av limoes', 'Agricultura', 'Sítio', 'Dinheiro', 'À Venda', NULL, 'Goiania', 'terreno/\\/photo_1623301707.webp', 1, 'Natural', NULL, 1, '2021-06-10 02:08:27', NULL, '2021-06-10 05:08:27', '2021-06-10 08:08:43', NULL),
	(15, '458854', NULL, 0.00, 0.00, NULL, 'Av sao paulo 526', 'Pecuária', 'Chácara', 'Dinheiro', 'À Venda', NULL, 'Sao paulo', 'terreno/\\/photo_1623301810.webp', 1, 'Natural', NULL, 1, '2021-06-10 02:10:11', NULL, '2021-06-10 05:10:11', '2021-06-10 08:10:32', NULL);
/*!40000 ALTER TABLE `imoveis` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.instalacoes
CREATE TABLE IF NOT EXISTS `instalacoes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.instalacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `instalacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `instalacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.institucional
CREATE TABLE IF NOT EXISTS `institucional` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.institucional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `institucional` DISABLE KEYS */;
INSERT INTO `institucional` (`id`, `title`, `sub_title`, `imagem`, `text`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'AGRO SOLUTIONS', 'Há 14 anos realizando sonhos com compromisso e seriedade.', 'institucional/photo_1623293254.png', '<p>Agropecu&aacute;ria foi lan&ccedil;ada em 2010 para atender &agrave;s necessidades de clientes em todo o Brasil que precisam ter acesso r&aacute;pido e pr&aacute;tico para adquirirprodutos para o agroneg&oacute;cio.</p>\r\n<p>Atrav&eacute;s da Loja Agropecu&aacute;ria, &eacute; poss&iacute;vel comprar, com todo conforto e seguran&ccedil;a que um E-commerce oferece, artigos para fazenda, implementos agr&iacute;colas, m&aacute;quinas e equipamentos para agricultura e pecu&aacute;ria, al&eacute;m de uma vasta gama de produtos para sa&uacute;de e alimenta&ccedil;&atilde;o animal.</p>\r\n<p>Contamos com uma variada lista de fornecedores e marcas renomadas para oferecer ao consumidor final uma ampla linha de produtos de qualidade comprovada e com &oacute;timas condi&ccedil;&otilde;es de pagamento.</p>\r\n<p>Nosso Portal re&uacute;ne em um s&oacute; lugar tudo o que voc&ecirc; precisa para tornar as suas compras ainda mais pr&aacute;ticas. E nossa equipe &eacute; treinada para oferecer aos nossos clientes toda a aten&ccedil;&atilde;o necess&aacute;ria durante e tamb&eacute;m no p&oacute;s-venda.</p>\r\n<div class="row">\r\n<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">\r\n<div class="about-content">&nbsp;</div>\r\n</div>\r\n</div>', NULL, '2021-05-11 01:41:43', '2021-06-10 05:47:35');
/*!40000 ALTER TABLE `institucional` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(11) DEFAULT NULL,
  `acao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dado` int(11) DEFAULT NULL,
  `formulario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.logs: ~223 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `usuario`, `acao`, `dado`, `formulario`, `ip`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-04 03:46:42', '2021-06-04 03:46:42'),
	(2, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-04 03:49:16', '2021-06-04 03:49:16'),
	(3, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-04 03:49:22', '2021-06-04 03:49:22'),
	(4, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-04 03:49:42', '2021-06-04 03:49:42'),
	(5, 1, 'Adicionar', 1, 'Banner', '127.0.0.1', '2021-06-04 03:56:29', '2021-06-04 03:56:29'),
	(6, 1, 'Adicionar', 2, 'Banner', '127.0.0.1', '2021-06-04 04:14:16', '2021-06-04 04:14:16'),
	(7, 1, 'Deletar', 2, 'Banner', '127.0.0.1', '2021-06-04 04:18:22', '2021-06-04 04:18:22'),
	(8, 1, 'Adicionar', 3, 'Banner', '127.0.0.1', '2021-06-04 04:18:58', '2021-06-04 04:18:58'),
	(9, 1, 'Adicionar', 4, 'Banner', '127.0.0.1', '2021-06-04 04:19:09', '2021-06-04 04:19:09'),
	(10, 1, 'Adicionar', 5, 'Banner', '127.0.0.1', '2021-06-04 04:29:21', '2021-06-04 04:29:21'),
	(11, 1, 'Deletar', 4, 'Banner', '127.0.0.1', '2021-06-04 04:29:30', '2021-06-04 04:29:30'),
	(12, 1, 'Deletar', 3, 'Banner', '127.0.0.1', '2021-06-04 04:29:35', '2021-06-04 04:29:35'),
	(13, 1, 'Alterar', 5, 'Banner', '127.0.0.1', '2021-06-04 04:30:51', '2021-06-04 04:30:51'),
	(14, 1, 'Alterar', 1, 'Institucional', '127.0.0.1', '2021-06-04 04:42:21', '2021-06-04 04:42:21'),
	(15, 1, 'Alterar', 1, 'Institucional', '127.0.0.1', '2021-06-04 04:46:19', '2021-06-04 04:46:19'),
	(16, 1, 'Alterar', 1, 'BannerInstitucional', '127.0.0.1', '2021-06-04 04:59:21', '2021-06-04 04:59:21'),
	(17, 1, 'Adicionar', 6, 'Banner', '127.0.0.1', '2021-06-05 21:40:33', '2021-06-05 21:40:33'),
	(18, 1, 'Adicionar', 7, 'Banner', '127.0.0.1', '2021-06-05 21:45:03', '2021-06-05 21:45:03'),
	(19, 1, 'Alterar', 7, 'Banner', '127.0.0.1', '2021-06-05 21:46:03', '2021-06-05 21:46:03'),
	(20, 1, 'Deletar', 5, 'Banner', '127.0.0.1', '2021-06-05 21:46:21', '2021-06-05 21:46:21'),
	(21, 1, 'Alterar', 7, 'Banner', '127.0.0.1', '2021-06-05 21:48:32', '2021-06-05 21:48:32'),
	(22, 1, 'Deletar', 7, 'Banner', '127.0.0.1', '2021-06-05 21:49:34', '2021-06-05 21:49:34'),
	(23, 1, 'Adicionar', 8, 'Banner', '127.0.0.1', '2021-06-05 21:50:04', '2021-06-05 21:50:04'),
	(24, 1, 'Adicionar', 9, 'Banner', '127.0.0.1', '2021-06-05 21:51:51', '2021-06-05 21:51:51'),
	(25, 1, 'Deletar', 8, 'Banner', '127.0.0.1', '2021-06-05 21:51:58', '2021-06-05 21:51:58'),
	(26, 1, 'Alterar', 1, 'BannerInstitucional', '127.0.0.1', '2021-06-05 21:52:47', '2021-06-05 21:52:47'),
	(27, 1, 'Alterar', 1, 'BannerInstitucional', '127.0.0.1', '2021-06-05 21:54:00', '2021-06-05 21:54:00'),
	(28, 1, 'Cadastro', 1, 'Imovel', '127.0.0.1', '2021-06-05 18:59:24', '2021-06-05 18:59:24'),
	(29, 1, 'Cadastro', 2, 'Imovel', '127.0.0.1', '2021-06-05 19:04:40', '2021-06-05 19:04:40'),
	(30, 1, 'Cadastro', 3, 'Imovel', '127.0.0.1', '2021-06-05 19:08:16', '2021-06-05 19:08:16'),
	(31, 1, 'Deletar', 3, 'Imovel', '127.0.0.1', '2021-06-05 22:10:29', '2021-06-05 22:10:29'),
	(32, 1, 'Deletar', 2, 'Imovel', '127.0.0.1', '2021-06-05 22:10:38', '2021-06-05 22:10:38'),
	(33, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-05 22:42:37', '2021-06-05 22:42:37'),
	(34, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-05 22:45:58', '2021-06-05 22:45:58'),
	(35, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-05 22:47:27', '2021-06-05 22:47:27'),
	(36, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-05 23:42:18', '2021-06-05 23:42:18'),
	(37, 1, 'Adicionar', 1, 'CategoriaAnimal', '127.0.0.1', '2021-06-06 00:15:07', '2021-06-06 00:15:07'),
	(38, 1, 'Adicionar', 2, 'CategoriaAnimal', '127.0.0.1', '2021-06-06 00:41:55', '2021-06-06 00:41:55'),
	(39, 1, 'Alterar', 2, 'CategoriaAnimal', '127.0.0.1', '2021-06-06 00:42:54', '2021-06-06 00:42:54'),
	(40, 1, 'Deletar', 2, 'CategoriaAnimal', '127.0.0.1', '2021-06-06 00:43:22', '2021-06-06 00:43:22'),
	(41, 1, 'Alterar', 1, 'Usuário', '127.0.0.1', '2021-06-06 00:43:44', '2021-06-06 00:43:44'),
	(42, 1, 'Adicionar', 2, 'Usuário', '127.0.0.1', '2021-06-06 00:59:55', '2021-06-06 00:59:55'),
	(43, 1, 'Deletar', 2, 'Usuário', '127.0.0.1', '2021-06-06 01:00:08', '2021-06-06 01:00:08'),
	(44, 1, 'Alterar', 1, 'Usuário', '127.0.0.1', '2021-06-06 01:02:53', '2021-06-06 01:02:53'),
	(45, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-06 01:11:17', '2021-06-06 01:11:17'),
	(46, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-06 01:16:37', '2021-06-06 01:16:37'),
	(47, 1, 'Adicionar', 3, 'CategoriaAnimal', '127.0.0.1', '2021-06-06 02:27:42', '2021-06-06 02:27:42'),
	(48, 1, 'Alterar', 1, 'CategoriaAnimal', '127.0.0.1', '2021-06-06 02:28:03', '2021-06-06 02:28:03'),
	(49, 1, 'Adicionar', 1, 'CategoriaRaca', '127.0.0.1', '2021-06-06 03:02:46', '2021-06-06 03:02:46'),
	(50, 1, 'Adicionar', 1, 'CategoriaMarca', '127.0.0.1', '2021-06-06 03:03:44', '2021-06-06 03:03:44'),
	(51, 1, 'Deletar', 1, 'CategoriaMarca', '127.0.0.1', '2021-06-06 03:03:53', '2021-06-06 03:03:53'),
	(52, 1, 'Adicionar', 2, 'CategoriaMarca', '127.0.0.1', '2021-06-06 03:04:15', '2021-06-06 03:04:15'),
	(53, 1, 'Alterar', 2, 'CategoriaMarca', '127.0.0.1', '2021-06-06 03:04:24', '2021-06-06 03:04:24'),
	(54, 1, 'Alterar', 2, 'CategoriaMarca', '127.0.0.1', '2021-06-06 03:04:30', '2021-06-06 03:04:30'),
	(55, 1, 'Alterar', 1, 'CategoriaRaca', '127.0.0.1', '2021-06-06 03:04:39', '2021-06-06 03:04:39'),
	(56, 1, 'Alterar', 1, 'CategoriaRaca', '127.0.0.1', '2021-06-06 03:04:45', '2021-06-06 03:04:45'),
	(57, 1, 'Deletar', 1, 'CategoriaRaca', '127.0.0.1', '2021-06-06 03:04:51', '2021-06-06 03:04:51'),
	(58, 1, 'Adicionar', 2, 'CategoriaRaca', '127.0.0.1', '2021-06-06 03:04:59', '2021-06-06 03:04:59'),
	(59, 1, 'Cadastro', 4, 'Animal', '127.0.0.1', '2021-06-08 00:31:28', '2021-06-08 00:31:28'),
	(60, 1, 'Cadastro', 5, 'Animal', '127.0.0.1', '2021-06-08 00:31:56', '2021-06-08 00:31:56'),
	(61, 1, 'Cadastro', 6, 'Animal', '127.0.0.1', '2021-06-08 00:36:15', '2021-06-08 00:36:15'),
	(62, 1, 'Status', 4, 'Animal', '127.0.0.1', '2021-06-08 03:39:14', '2021-06-08 03:39:14'),
	(63, 1, 'Status', 4, 'Animal', '127.0.0.1', '2021-06-08 03:39:29', '2021-06-08 03:39:29'),
	(64, 1, 'Deletar', 6, 'Animal', '127.0.0.1', '2021-06-08 03:39:34', '2021-06-08 03:39:34'),
	(65, 1, 'Cadastro', 7, 'Equipamento', '127.0.0.1', '2021-06-09 03:27:00', '2021-06-09 03:27:00'),
	(66, 1, 'Status', 7, 'Equipamento', '127.0.0.1', '2021-06-09 06:27:47', '2021-06-09 06:27:47'),
	(67, 1, 'Status', 7, 'Equipamento', '127.0.0.1', '2021-06-09 06:27:50', '2021-06-09 06:27:50'),
	(68, 1, 'Alterar', 7, 'Equipamento', '127.0.0.1', '2021-06-09 06:35:03', '2021-06-09 06:35:03'),
	(69, 1, 'Deletar', 7, 'Equipamento', '127.0.0.1', '2021-06-09 06:35:40', '2021-06-09 06:35:40'),
	(70, 1, 'Cadastro', 8, 'Equipamento', '127.0.0.1', '2021-06-09 03:36:11', '2021-06-09 03:36:11'),
	(71, 1, 'Alterar', 4, 'Animal', '127.0.0.1', '2021-06-09 06:39:14', '2021-06-09 06:39:14'),
	(72, 1, 'Cadastro', 9, 'Equipamento', '127.0.0.1', '2021-06-09 03:43:50', '2021-06-09 03:43:50'),
	(73, 1, 'Alterar', 9, 'Equipamento', '127.0.0.1', '2021-06-09 06:44:16', '2021-06-09 06:44:16'),
	(74, 1, 'Alterar', 1, 'BannerAnimal', '127.0.0.1', '2021-06-09 07:06:45', '2021-06-09 07:06:45'),
	(75, 1, 'Alterar', 1, 'BannerTerreno', '127.0.0.1', '2021-06-09 07:08:41', '2021-06-09 07:08:41'),
	(76, 1, 'Alterar', 1, 'BannerTerreno', '127.0.0.1', '2021-06-09 07:09:11', '2021-06-09 07:09:11'),
	(77, 1, 'Alterar', 1, 'BannerAnimal', '127.0.0.1', '2021-06-09 07:09:34', '2021-06-09 07:09:34'),
	(78, 1, 'Alterar', 1, 'BannerEquipamento', '127.0.0.1', '2021-06-09 07:11:32', '2021-06-09 07:11:32'),
	(79, 1, 'Alterar', 1, 'BannerBlog', '127.0.0.1', '2021-06-09 07:12:51', '2021-06-09 07:12:51'),
	(80, 1, 'Adicionar', 4, 'CategoriaBlog', '127.0.0.1', '2021-06-09 07:20:29', '2021-06-09 07:20:29'),
	(81, 1, 'Adicionar', 5, 'CategoriaBlog', '127.0.0.1', '2021-06-09 07:21:23', '2021-06-09 07:21:23'),
	(82, 1, 'Adicionar', 6, 'CategoriaBlog', '127.0.0.1', '2021-06-09 07:21:34', '2021-06-09 07:21:34'),
	(83, 1, 'Adicionar', 7, 'CategoriaBlog', '127.0.0.1', '2021-06-09 07:21:41', '2021-06-09 07:21:41'),
	(84, 1, 'Alterar', 7, 'CategoriaBlog', '127.0.0.1', '2021-06-09 07:21:48', '2021-06-09 07:21:48'),
	(85, 1, 'Deletar', 7, 'CategoriaBlog', '127.0.0.1', '2021-06-09 07:21:52', '2021-06-09 07:21:52'),
	(86, 1, 'Cadastro', 10, 'Blog', '127.0.0.1', '2021-06-09 04:51:24', '2021-06-09 04:51:24'),
	(87, 1, 'Deletar', 10, 'Blog', '127.0.0.1', '2021-06-09 07:58:40', '2021-06-09 07:58:40'),
	(88, 1, 'Cadastro', 11, 'Blog', '127.0.0.1', '2021-06-09 05:01:09', '2021-06-09 05:01:09'),
	(89, 1, 'Alterar', 11, 'Blog', '127.0.0.1', '2021-06-09 08:01:25', '2021-06-09 08:01:25'),
	(90, 1, 'Status', 11, 'Blog', '127.0.0.1', '2021-06-09 08:01:29', '2021-06-09 08:01:29'),
	(91, 1, 'Alterar', 11, 'Blog', '127.0.0.1', '2021-06-09 08:02:07', '2021-06-09 08:02:07'),
	(92, 1, 'Status', 11, 'Blog', '127.0.0.1', '2021-06-09 08:02:11', '2021-06-09 08:02:11'),
	(93, 1, 'Alterar', 11, 'Blog', '127.0.0.1', '2021-06-09 08:02:30', '2021-06-09 08:02:30'),
	(94, 1, 'Alterar', 11, 'Blog', '127.0.0.1', '2021-06-09 08:03:08', '2021-06-09 08:03:08'),
	(95, 1, 'Status', 11, 'Blog', '127.0.0.1', '2021-06-09 08:03:12', '2021-06-09 08:03:12'),
	(96, 1, 'Alterar', 11, 'Blog', '127.0.0.1', '2021-06-09 08:03:25', '2021-06-09 08:03:25'),
	(97, 1, 'Status', 11, 'Blog', '127.0.0.1', '2021-06-09 08:03:28', '2021-06-09 08:03:28'),
	(98, 1, 'Deletar', 11, 'Blog', '127.0.0.1', '2021-06-09 08:03:33', '2021-06-09 08:03:33'),
	(99, 1, 'Cadastro', 12, 'Blog', '127.0.0.1', '2021-06-09 05:04:06', '2021-06-09 05:04:06'),
	(100, 1, 'Alterar', 1, 'FraseRodape', '127.0.0.1', '2021-06-09 08:15:00', '2021-06-09 08:15:00'),
	(101, 1, 'Alterar', 1, 'FraseRodape', '127.0.0.1', '2021-06-09 08:17:09', '2021-06-09 08:17:09'),
	(102, 1, 'Alterar', 1, 'FraseRodape', '127.0.0.1', '2021-06-09 08:17:51', '2021-06-09 08:17:51'),
	(103, 1, 'Alterar', 1, 'FraseRodape', '127.0.0.1', '2021-06-09 08:19:46', '2021-06-09 08:19:46'),
	(104, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-09 08:23:29', '2021-06-09 08:23:29'),
	(105, 1, 'Alterar', 4, 'Animal', '127.0.0.1', '2021-06-09 08:29:46', '2021-06-09 08:29:46'),
	(106, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-09 08:31:13', '2021-06-09 08:31:13'),
	(107, 1, 'Alterar', 9, 'Equipamento', '127.0.0.1', '2021-06-09 08:31:50', '2021-06-09 08:31:50'),
	(108, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-09 08:32:13', '2021-06-09 08:32:13'),
	(109, 1, 'Alterar', 1, 'Smtp', '127.0.0.1', '2021-06-09 08:41:33', '2021-06-09 08:41:33'),
	(110, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-10 01:26:17', '2021-06-10 01:26:17'),
	(111, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-10 01:34:47', '2021-06-10 01:34:47'),
	(112, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-10 01:34:55', '2021-06-10 01:34:55'),
	(113, 1, 'Deletar', 10, 'Banner', '127.0.0.1', '2021-06-10 01:49:07', '2021-06-10 01:49:07'),
	(114, 1, 'Alterar', 9, 'Banner', '127.0.0.1', '2021-06-10 01:49:58', '2021-06-10 01:49:58'),
	(115, 1, 'Adicionar', 11, 'Banner', '127.0.0.1', '2021-06-10 01:50:24', '2021-06-10 01:50:24'),
	(116, 1, 'Deletar', 11, 'Banner', '127.0.0.1', '2021-06-10 01:50:29', '2021-06-10 01:50:29'),
	(117, 1, 'Status', 9, 'Banner', '127.0.0.1', '2021-06-10 01:55:41', '2021-06-10 01:55:41'),
	(118, 1, 'Status', 9, 'Banner', '127.0.0.1', '2021-06-10 01:57:44', '2021-06-10 01:57:44'),
	(119, 1, 'Alterar', 9, 'Banner', '127.0.0.1', '2021-06-10 01:58:27', '2021-06-10 01:58:27'),
	(120, 1, 'Status', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:01:47', '2021-06-10 02:01:47'),
	(121, 1, 'Status', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:01:59', '2021-06-10 02:01:59'),
	(122, 1, 'Status', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:03:04', '2021-06-10 02:03:04'),
	(123, 1, 'Status', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:05:43', '2021-06-10 02:05:43'),
	(124, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:11:07', '2021-06-10 02:11:07'),
	(125, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:22:51', '2021-06-10 02:22:51'),
	(126, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:24:18', '2021-06-10 02:24:18'),
	(127, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:31:17', '2021-06-10 02:31:17'),
	(128, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:46:59', '2021-06-10 02:46:59'),
	(129, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:52:11', '2021-06-10 02:52:11'),
	(130, 1, 'Alterar', 4, 'Imovel', '127.0.0.1', '2021-06-10 02:52:26', '2021-06-10 02:52:26'),
	(131, 1, 'Alterar', 5, 'Imovel', '127.0.0.1', '2021-06-10 02:52:36', '2021-06-10 02:52:36'),
	(132, 1, 'Alterar', 4, 'Imovel', '127.0.0.1', '2021-06-10 02:55:37', '2021-06-10 02:55:37'),
	(133, 1, 'Alterar', 4, 'Imovel', '127.0.0.1', '2021-06-10 02:57:06', '2021-06-10 02:57:06'),
	(134, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:57:20', '2021-06-10 02:57:20'),
	(135, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 02:57:41', '2021-06-10 02:57:41'),
	(136, 1, 'Alterar', 4, 'Animal', '127.0.0.1', '2021-06-10 03:09:10', '2021-06-10 03:09:10'),
	(137, 1, 'Alterar', 4, 'Animal', '127.0.0.1', '2021-06-10 03:13:52', '2021-06-10 03:13:52'),
	(138, 1, 'Alterar', 4, 'Animal', '127.0.0.1', '2021-06-10 03:18:15', '2021-06-10 03:18:15'),
	(139, 1, 'Alterar', 4, 'Animal', '127.0.0.1', '2021-06-10 03:19:02', '2021-06-10 03:19:02'),
	(140, 1, 'Alterar', 9, 'Equipamento', '127.0.0.1', '2021-06-10 03:42:27', '2021-06-10 03:42:27'),
	(141, 1, 'Alterar', 9, 'Equipamento', '127.0.0.1', '2021-06-10 03:47:13', '2021-06-10 03:47:13'),
	(142, 1, 'Alterar', 9, 'Equipamento', '127.0.0.1', '2021-06-10 03:49:57', '2021-06-10 03:49:57'),
	(143, 1, 'Alterar', 9, 'Equipamento', '127.0.0.1', '2021-06-10 03:51:51', '2021-06-10 03:51:51'),
	(144, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 04:19:08', '2021-06-10 04:19:08'),
	(145, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 04:19:54', '2021-06-10 04:19:54'),
	(146, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 04:22:22', '2021-06-10 04:22:22'),
	(147, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 04:24:15', '2021-06-10 04:24:15'),
	(148, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 04:34:40', '2021-06-10 04:34:40'),
	(149, 1, 'Alterar', 20, 'Blog', '127.0.0.1', '2021-06-10 04:35:06', '2021-06-10 04:35:06'),
	(150, 1, 'Alterar', 19, 'Blog', '127.0.0.1', '2021-06-10 04:35:40', '2021-06-10 04:35:40'),
	(151, 1, 'Alterar', 19, 'Blog', '127.0.0.1', '2021-06-10 04:36:01', '2021-06-10 04:36:01'),
	(152, 1, 'Alterar', 20, 'Blog', '127.0.0.1', '2021-06-10 04:36:24', '2021-06-10 04:36:24'),
	(153, 1, 'Alterar', 1, 'FraseRodape', '127.0.0.1', '2021-06-10 04:37:24', '2021-06-10 04:37:24'),
	(154, 1, 'Alterar', 1, 'FraseRodape', '127.0.0.1', '2021-06-10 04:41:27', '2021-06-10 04:41:27'),
	(155, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-10 04:48:57', '2021-06-10 04:48:57'),
	(156, 1, 'Alterar', 1, 'Empresa', '127.0.0.1', '2021-06-10 04:49:48', '2021-06-10 04:49:48'),
	(157, 1, 'Alterar', 1, 'Institucional', '127.0.0.1', '2021-06-10 05:46:54', '2021-06-10 05:46:54'),
	(158, 1, 'Alterar', 1, 'Institucional', '127.0.0.1', '2021-06-10 05:47:35', '2021-06-10 05:47:35'),
	(159, 1, 'Alterar', 1, 'BannerInstitucional', '127.0.0.1', '2021-06-10 05:49:01', '2021-06-10 05:49:01'),
	(160, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 06:26:09', '2021-06-10 06:26:09'),
	(161, 1, 'Alterar', 4, 'Imovel', '127.0.0.1', '2021-06-10 06:26:31', '2021-06-10 06:26:31'),
	(162, 1, 'Alterar', 5, 'Imovel', '127.0.0.1', '2021-06-10 06:26:52', '2021-06-10 06:26:52'),
	(163, 1, 'Alterar', 13, 'Imovel', '127.0.0.1', '2021-06-10 06:27:12', '2021-06-10 06:27:12'),
	(164, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 06:48:32', '2021-06-10 06:48:32'),
	(165, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 06:56:21', '2021-06-10 06:56:21'),
	(166, 1, 'Alterar', 1, 'Imovel', '127.0.0.1', '2021-06-10 06:58:27', '2021-06-10 06:58:27'),
	(167, 1, 'Cadastro', 14, 'Equipamento', '127.0.0.1', '2021-06-10 04:34:25', '2021-06-10 04:34:25'),
	(168, 1, 'Deletar', 13, 'Equipamento', '127.0.0.1', '2021-06-10 07:34:34', '2021-06-10 07:34:34'),
	(169, 1, 'Deletar', 9, 'Equipamento', '127.0.0.1', '2021-06-10 07:34:41', '2021-06-10 07:34:41'),
	(170, 1, 'Deletar', 10, 'Equipamento', '127.0.0.1', '2021-06-10 07:34:46', '2021-06-10 07:34:46'),
	(171, 1, 'Deletar', 11, 'Equipamento', '127.0.0.1', '2021-06-10 07:34:50', '2021-06-10 07:34:50'),
	(172, 1, 'Deletar', 12, 'Equipamento', '127.0.0.1', '2021-06-10 07:34:55', '2021-06-10 07:34:55'),
	(173, 1, 'Cadastro', 15, 'Equipamento', '127.0.0.1', '2021-06-10 04:36:44', '2021-06-10 04:36:44'),
	(174, 1, 'Cadastro', 16, 'Equipamento', '127.0.0.1', '2021-06-10 04:38:57', '2021-06-10 04:38:57'),
	(175, 1, 'Alterar', 15, 'Equipamento', '127.0.0.1', '2021-06-10 07:39:40', '2021-06-10 07:39:40'),
	(176, 1, 'Status', 15, 'Equipamento', '127.0.0.1', '2021-06-10 07:42:00', '2021-06-10 07:42:00'),
	(177, 1, 'Status', 15, 'Equipamento', '127.0.0.1', '2021-06-10 07:42:07', '2021-06-10 07:42:07'),
	(178, 1, 'Alterar', 15, 'Equipamento', '127.0.0.1', '2021-06-10 07:42:36', '2021-06-10 07:42:36'),
	(179, 1, 'Status', 15, 'Equipamento', '127.0.0.1', '2021-06-10 07:44:20', '2021-06-10 07:44:20'),
	(180, 1, 'Cadastro', 17, 'Equipamento', '127.0.0.1', '2021-06-10 04:45:28', '2021-06-10 04:45:28'),
	(181, 1, 'Alterar', 17, 'Equipamento', '127.0.0.1', '2021-06-10 07:45:55', '2021-06-10 07:45:55'),
	(182, 1, 'Cadastro', 18, 'Equipamento', '127.0.0.1', '2021-06-10 04:47:16', '2021-06-10 04:47:16'),
	(183, 1, 'Alterar', 18, 'Equipamento', '127.0.0.1', '2021-06-10 07:47:40', '2021-06-10 07:47:40'),
	(184, 1, 'Cadastro', 19, 'Equipamento', '127.0.0.1', '2021-06-10 04:49:06', '2021-06-10 04:49:06'),
	(185, 1, 'Alterar', 19, 'Equipamento', '127.0.0.1', '2021-06-10 07:49:30', '2021-06-10 07:49:30'),
	(186, 1, 'Cadastro', 20, 'Equipamento', '127.0.0.1', '2021-06-10 04:50:53', '2021-06-10 04:50:53'),
	(187, 1, 'Alterar', 20, 'Equipamento', '127.0.0.1', '2021-06-10 07:51:13', '2021-06-10 07:51:13'),
	(188, 1, 'Alterar', 10, 'Animal', '127.0.0.1', '2021-06-10 07:53:02', '2021-06-10 07:53:02'),
	(189, 1, 'Alterar', 10, 'Animal', '127.0.0.1', '2021-06-10 07:53:50', '2021-06-10 07:53:50'),
	(190, 1, 'Alterar', 10, 'Animal', '127.0.0.1', '2021-06-10 07:54:39', '2021-06-10 07:54:39'),
	(191, 1, 'Alterar', 9, 'Animal', '127.0.0.1', '2021-06-10 07:55:43', '2021-06-10 07:55:43'),
	(192, 1, 'Deletar', 4, 'Animal', '127.0.0.1', '2021-06-10 07:56:01', '2021-06-10 07:56:01'),
	(193, 1, 'Deletar', 7, 'Animal', '127.0.0.1', '2021-06-10 07:56:06', '2021-06-10 07:56:06'),
	(194, 1, 'Deletar', 8, 'Animal', '127.0.0.1', '2021-06-10 07:56:10', '2021-06-10 07:56:10'),
	(195, 1, 'Deletar', 9, 'Animal', '127.0.0.1', '2021-06-10 07:56:15', '2021-06-10 07:56:15'),
	(196, 1, 'Cadastro', 11, 'Animal', '127.0.0.1', '2021-06-10 04:57:05', '2021-06-10 04:57:05'),
	(197, 1, 'Cadastro', 12, 'Animal', '127.0.0.1', '2021-06-10 04:57:55', '2021-06-10 04:57:55'),
	(198, 1, 'Alterar', 11, 'Animal', '127.0.0.1', '2021-06-10 07:58:31', '2021-06-10 07:58:31'),
	(199, 1, 'Alterar', 12, 'Animal', '127.0.0.1', '2021-06-10 07:59:11', '2021-06-10 07:59:11'),
	(200, 1, 'Cadastro', 13, 'Animal', '127.0.0.1', '2021-06-10 05:00:26', '2021-06-10 05:00:26'),
	(201, 1, 'Alterar', 13, 'Animal', '127.0.0.1', '2021-06-10 08:00:54', '2021-06-10 08:00:54'),
	(202, 1, 'Cadastro', 14, 'Animal', '127.0.0.1', '2021-06-10 05:02:44', '2021-06-10 05:02:44'),
	(203, 1, 'Alterar', 14, 'Animal', '127.0.0.1', '2021-06-10 08:03:07', '2021-06-10 08:03:07'),
	(204, 1, 'Cadastro', 15, 'Animal', '127.0.0.1', '2021-06-10 05:04:12', '2021-06-10 05:04:12'),
	(205, 1, 'Alterar', 15, 'Animal', '127.0.0.1', '2021-06-10 08:04:42', '2021-06-10 08:04:42'),
	(206, 1, 'Alterar', 13, 'Imovel', '127.0.0.1', '2021-06-10 08:06:00', '2021-06-10 08:06:00'),
	(207, 1, 'Alterar', 5, 'Imovel', '127.0.0.1', '2021-06-10 08:06:45', '2021-06-10 08:06:45'),
	(208, 1, 'Alterar', 4, 'Imovel', '127.0.0.1', '2021-06-10 08:07:21', '2021-06-10 08:07:21'),
	(209, 1, 'Cadastro', 14, 'Imovel', '127.0.0.1', '2021-06-10 05:08:28', '2021-06-10 05:08:28'),
	(210, 1, 'Alterar', 14, 'Imovel', '127.0.0.1', '2021-06-10 08:08:44', '2021-06-10 08:08:44'),
	(211, 1, 'Cadastro', 15, 'Imovel', '127.0.0.1', '2021-06-10 05:10:11', '2021-06-10 05:10:11'),
	(212, 1, 'Alterar', 15, 'Imovel', '127.0.0.1', '2021-06-10 08:10:32', '2021-06-10 08:10:32'),
	(213, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 08:14:09', '2021-06-10 08:14:09'),
	(214, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 08:14:48', '2021-06-10 08:14:48'),
	(215, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 08:16:03', '2021-06-10 08:16:03'),
	(216, 1, 'Alterar', 4, 'CategoriaBlog', '127.0.0.1', '2021-06-10 08:16:56', '2021-06-10 08:16:56'),
	(217, 1, 'Alterar', 19, 'Blog', '127.0.0.1', '2021-06-10 08:18:06', '2021-06-10 08:18:06'),
	(218, 1, 'Alterar', 19, 'Blog', '127.0.0.1', '2021-06-10 08:18:08', '2021-06-10 08:18:08'),
	(219, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 08:18:27', '2021-06-10 08:18:27'),
	(220, 1, 'Alterar', 20, 'Blog', '127.0.0.1', '2021-06-10 08:18:51', '2021-06-10 08:18:51'),
	(221, 1, 'Alterar', 20, 'Blog', '127.0.0.1', '2021-06-10 08:18:53', '2021-06-10 08:18:53'),
	(222, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-10 08:25:38', '2021-06-10 08:25:38'),
	(223, 1, 'Alterar', 1, 'Smtp', '127.0.0.1', '2021-06-10 22:31:35', '2021-06-10 22:31:35'),
	(224, 1, 'Alterar', 1, 'Smtp', '127.0.0.1', '2021-06-10 22:39:29', '2021-06-10 22:39:29'),
	(225, 1, 'Alterar', 1, 'Smtp', '127.0.0.1', '2021-06-10 22:51:20', '2021-06-10 22:51:20'),
	(226, 1, 'Alterar', 12, 'Blog', '127.0.0.1', '2021-06-11 02:24:16', '2021-06-11 02:24:16'),
	(227, 1, 'Status', 10, 'Animal', '127.0.0.1', '2021-06-15 01:09:11', '2021-06-15 01:09:11'),
	(228, 1, 'Status', 10, 'Animal', '127.0.0.1', '2021-06-15 01:09:15', '2021-06-15 01:09:15'),
	(229, 1, 'Alterar', 1, 'Smtp', '127.0.0.1', '2021-10-15 21:40:26', '2021-10-15 21:40:26'),
	(230, 1, 'Adicionar', 3, 'Usuário', '127.0.0.1', '2021-10-15 21:48:47', '2021-10-15 21:48:47'),
	(231, 1, 'Deletar', 3, 'Usuário', '127.0.0.1', '2021-10-15 21:48:53', '2021-10-15 21:48:53');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.marca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(2, 'John Deere', '2021-06-06 03:04:15', '2021-06-06 03:04:30');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_page` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.migrations: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_03_10_233458_create_banners_table', 1),
	(5, '2021_03_11_214808_create_imoveis_table', 1),
	(6, '2021_03_13_002036_create_galleria_fotos_table', 1),
	(7, '2021_03_16_201816_create_institucional_table', 1),
	(8, '2021_03_17_171629_create_empresa_table', 1),
	(9, '2021_03_17_215451_create_telefones_table', 1),
	(10, '2021_03_17_225450_create_instalacoes_table', 1),
	(11, '2021_03_18_122730_create_galleria_instalacoes_table', 1),
	(12, '2021_03_18_140618_create_logs_table', 1),
	(13, '2021_04_29_002332_create_politica_table', 1),
	(14, '2021_04_29_002510_create_termo_table', 1),
	(15, '2021_05_04_222552_create_menu_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.politica
CREATE TABLE IF NOT EXISTS `politica` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.politica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `politica` DISABLE KEYS */;
INSERT INTO `politica` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
	(1, 'Albercamp', 'Lorem Ipson', '2021-05-11 01:41:43', '2021-05-11 01:41:43');
/*!40000 ALTER TABLE `politica` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.raca
CREATE TABLE IF NOT EXISTS `raca` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.raca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `raca` DISABLE KEYS */;
INSERT INTO `raca` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(2, 'Quarto de milha', '2021-06-06 03:04:59', '2021-06-06 03:04:59');
/*!40000 ALTER TABLE `raca` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.smtp
CREATE TABLE IF NOT EXISTS `smtp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `nome_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_adm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela agro_imob.smtp: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `smtp` DISABLE KEYS */;
INSERT INTO `smtp` (`id`, `host`, `usuario`, `senha`, `port`, `nome_site`, `email_adm`, `link_site`, `created_at`, `updated_at`) VALUES
	(1, 'teste.com', 'teste@teste.com.br', 'netteste', 587, 'AGRO SOLUTIONS', 'teste@gmail.com', 'Test', '2021-06-09 05:40:38', '2021-10-15 21:40:26');
/*!40000 ALTER TABLE `smtp` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.telefones
CREATE TABLE IF NOT EXISTS `telefones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.telefones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` (`id`, `telefone`, `created_at`, `updated_at`) VALUES
	(1, '(62) 3232-4242', '2021-06-10 04:49:48', '2021-06-10 04:49:48');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.termo
CREATE TABLE IF NOT EXISTS `termo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.termo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `termo` DISABLE KEYS */;
INSERT INTO `termo` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
	(1, 'Albercamp', 'Lorem Ipson', '2021-05-11 01:41:43', '2021-05-11 01:41:43');
/*!40000 ALTER TABLE `termo` ENABLE KEYS */;

-- Copiando estrutura para tabela agro_imob.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela agro_imob.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `imagem`, `nivel_acesso`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'usuarios/\\/photo_1622930573.webp', 1, 1, 'adm@adm', NULL, '$2y$10$dvRAJuMjhaGwmuE8WwZ0IOSX7FZAO7GM9LiAEXn.eeiMIdL6t0dR.', NULL, '2021-05-11 01:41:43', '2021-06-06 01:02:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
