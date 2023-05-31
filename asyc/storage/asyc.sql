-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Maio-2023 às 00:38
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `asyc`
--
CREATE DATABASE IF NOT EXISTS `asyc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asyc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(25) NOT NULL,
  `accountType` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `overallBalance` float(6,2) NOT NULL,
  `income` float(6,2) NOT NULL,
  `expense` float(6,2) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `accountingmovement`
--

CREATE TABLE IF NOT EXISTS `accountingmovement` (
  `accountingMovement_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` float(6,2) NOT NULL,
  `ammountPaid` float(6,2) NOT NULL,
  `description` varchar(100) NOT NULL,
  `accountingMovementType` varchar(7) NOT NULL,
  `destinationAccount` varchar(25) NOT NULL,
  `creditor` varchar(100) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `formOfPayment` varchar(15) NOT NULL,
  `isInstallment` tinyint(1) DEFAULT '0',
  `qtdeInstallment` int(11) DEFAULT NULL,
  `qtdeInstallmentPaid` int(11) DEFAULT NULL,
  `installmentPrice` float(5,2) DEFAULT NULL,
  `dueDate` date NOT NULL,
  `lastPaymentDate` date NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(11) NOT NULL,
  `serviceOrder_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`accountingMovement_id`),
  KEY `accountingMovement_account_fk` (`account_id`),
  KEY `accountingMovement_serviceOrder_fk` (`serviceOrder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `accountingposting`
--

CREATE TABLE IF NOT EXISTS `accountingposting` (
  `accountingPosting_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` float(6,2) NOT NULL,
  `description` varchar(100) NOT NULL,
  `accountingPostingType` varchar(7) NOT NULL,
  `destinationAccount` varchar(25) NOT NULL,
  `creditor` varchar(100) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `formOfPayment` varchar(15) NOT NULL,
  `isInstallment` tinyint(1) DEFAULT '0',
  `qtdeInstallment` int(11) DEFAULT NULL,
  `installmentPrice` float(5,2) DEFAULT NULL,
  `dueDate` date NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(11) NOT NULL,
  `serviceOrder_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`accountingPosting_id`),
  KEY `accountingPosting_account_fk` (`account_id`),
  KEY `accountingPosting_serviceOrder_fk` (`serviceOrder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `telephone` varchar(8) DEFAULT NULL,
  `cellphone` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `houseNumber` varchar(6) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(50) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_uc` (`name`,`cellphone`,`email`,`rg`,`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `telephone` varchar(8) DEFAULT NULL,
  `cellphone` varchar(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `houseNumber` varchar(6) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(50) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `civilStatus` varchar(25) DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `rg` varchar(14) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `commission` float(6,2) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `employee_uc` (`name`,`cellphone`,`email`,`rg`,`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `labour`
--

CREATE TABLE IF NOT EXISTS `labour` (
  `labour_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` float(6,2) NOT NULL,
  `labourType` varchar(6) NOT NULL,
  `description` varchar(100) NOT NULL,
  `responsibleTechnician` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `serviceOrder_id` int(11) NOT NULL,
  PRIMARY KEY (`labour_id`),
  KEY `labour_serviceOrder_fk` (`serviceOrder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `salePrice` float(6,2) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `model` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `productCode` varchar(6) NOT NULL,
  `barcode` varchar(13) DEFAULT NULL,
  `weight` float(5,2) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_uc` (`description`,`productCode`,`barcode`),
  KEY `product_stock_id` (`stock_id`),
  KEY `product_supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` float(6,2) NOT NULL,
  `complaint` varchar(250) NOT NULL,
  `checklist` varchar(150) DEFAULT NULL,
  `formOfPayment` varchar(15) DEFAULT NULL,
  `isInstallment` tinyint(1) DEFAULT '0',
  `situation` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `approvalDate` date DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `serviceorder`
--

CREATE TABLE IF NOT EXISTS `serviceorder` (
  `serviceOrder_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` float(6,2) NOT NULL,
  `model` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `licensePlate` varchar(7) NOT NULL,
  `mileage` int(11) NOT NULL,
  `complaint` varchar(250) NOT NULL,
  `responsibleTechnician` varchar(75) NOT NULL,
  `technicalReport` varchar(250) DEFAULT NULL,
  `situation` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `pickUpDate` date DEFAULT NULL,
  `closingDate` date DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quote_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`serviceOrder_id`),
  KEY `serviceOrder_quote_fk` (`quote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `qtdeProductsStored` int(11) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `stock_uc` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `telephone` varchar(8) DEFAULT NULL,
  `cellphone` varchar(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `neighborhood` varchar(50) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_uc` (`name`,`cellphone`,`email`,`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usedproduct`
--

CREATE TABLE IF NOT EXISTS `usedproduct` (
  `usedProduct_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` float(6,2) NOT NULL,
  `usedProductType` varchar(7) NOT NULL,
  `description` varchar(100) NOT NULL,
  `productCode` varchar(6) DEFAULT NULL,
  `barcode` varchar(13) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `serviceOrder_id` int(11) NOT NULL,
  PRIMARY KEY (`usedProduct_id`),
  UNIQUE KEY `usedProduct_uc` (`productCode`,`barcode`),
  KEY `usedProduct_serviceOrder_fk` (`serviceOrder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `licensePlate` varchar(7) NOT NULL,
  `mileage` float NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `vehicle_uc` (`licensePlate`),
  KEY `vehicle_customer_fk` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `accountingmovement`
--
ALTER TABLE `accountingmovement`
  ADD CONSTRAINT `accountingMovement_account_fk` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `accountingMovement_serviceOrder_fk` FOREIGN KEY (`serviceOrder_id`) REFERENCES `serviceorder` (`serviceOrder_id`);

--
-- Limitadores para a tabela `accountingposting`
--
ALTER TABLE `accountingposting`
  ADD CONSTRAINT `accountingPosting_account_fk` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `accountingPosting_serviceOrder_fk` FOREIGN KEY (`serviceOrder_id`) REFERENCES `serviceorder` (`serviceOrder_id`);

--
-- Limitadores para a tabela `labour`
--
ALTER TABLE `labour`
  ADD CONSTRAINT `labour_serviceOrder_fk` FOREIGN KEY (`serviceOrder_id`) REFERENCES `serviceorder` (`serviceOrder_id`);

--
-- Limitadores para a tabela `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_stock_id` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`),
  ADD CONSTRAINT `product_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Limitadores para a tabela `serviceorder`
--
ALTER TABLE `serviceorder`
  ADD CONSTRAINT `serviceOrder_quote_fk` FOREIGN KEY (`quote_id`) REFERENCES `quote` (`quote_id`);

--
-- Limitadores para a tabela `usedproduct`
--
ALTER TABLE `usedproduct`
  ADD CONSTRAINT `usedProduct_serviceOrder_fk` FOREIGN KEY (`serviceOrder_id`) REFERENCES `serviceorder` (`serviceOrder_id`);

--
-- Limitadores para a tabela `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
