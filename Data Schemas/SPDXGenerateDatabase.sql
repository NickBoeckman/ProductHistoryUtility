-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2014 at 02:40 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SPDX`
--
CREATE DATABASE IF NOT EXISTS `SPDX` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `SPDX`;

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE IF NOT EXISTS `creators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `generated_at` datetime NOT NULL,
  `createor_comments` text NOT NULL,
  `license_list_version` varchar(255) NOT NULL,
  `spdx_doc_id` int(11) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spdx_doc_id` (`spdx_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_file_package_associations`
--

CREATE TABLE IF NOT EXISTS `doc_file_package_associations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spdx_doc_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_file_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spdx_doc_id` (`spdx_doc_id`),
  KEY `package_id` (`package_id`),
  KEY `package_file_id` (`package_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_license_associations`
--

CREATE TABLE IF NOT EXISTS `doc_license_associations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spdx_doc_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `license_identifer` varchar(255) NOT NULL,
  `license_name` varchar(255) NOT NULL,
  `license_comments` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spdx_doc_id` (`spdx_doc_id`),
  KEY `license_id` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extracted_text` text NOT NULL,
  `license_name` varchar(255) NOT NULL,
  `osi_approved` varchar(255) NOT NULL,
  `standard_license_header` varchar(255) NOT NULL,
  `license_cross_reference` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `licensings`
--

CREATE TABLE IF NOT EXISTS `licensings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_file_id` int(11) NOT NULL,
  `juncture` varchar(255) NOT NULL,
  `doc_license_association_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_file_id` (`package_file_id`),
  KEY `doc_license_association_id` (`doc_license_association_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `package_file_name` varchar(255) NOT NULL,
  `package_download_location` varchar(255) NOT NULL,
  `package_copyright_text` text NOT NULL,
  `package_version` varchar(255) NOT NULL,
  `package_description` text NOT NULL,
  `package_summary` text NOT NULL,
  `package_originator` varchar(255) NOT NULL,
  `package_supplier` varchar(255) NOT NULL,
  `package_license_concluded` text,
  `package_license_declared` text,
  `package_checksum` varchar(255) NOT NULL,
  `checksum_algorithm` varchar(255) NOT NULL,
  `package_home_page` varchar(255) NOT NULL,
  `package_source_info` varchar(255) NOT NULL,
  `package_license_info_from_files` text NOT NULL,
  `package_license_comments` text NOT NULL,
  `package_verification_code` varchar(255) NOT NULL,
  `package_verification_code_excluded_file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_file_name`, `package_download_location`, `package_copyright_text`, `package_version`, `package_description`, `package_summary`, `package_originator`, `package_supplier`, `package_license_concluded`, `package_license_declared`, `package_checksum`, `checksum_algorithm`, `package_home_page`, `package_source_info`, `package_license_info_from_files`, `package_license_comments`, `package_verification_code`, `package_verification_code_excluded_file`, `created_at`, `updated_at`) VALUES
(1, 'UNO-apache2_v2.2.8.spdx.tag', 'UNO-apache2_v2.2.8.spdx.tag', 'http://packages.ubuntu.com/hardy/apache2', 'NONE', '2.2.8', 'apache2 v2.2.8 original tar', 'summary', 'Person:a private originator', 'Person:a private supplier', 'NO ASSERTION', 'NO ASSERTION', 'package_checksum', 'checksum_algorithm', 'http://spdxhub.ist.unomaha.edu/spdx_docs/5', 'source_info', 'package_license_info_from_files', 'license_comments', 'verification_code', 'code_excluded_file', '2014-02-22 00:00:00', '2014-02-22 00:00:00'),
(2, 'BusyBox.tag', 'BusyBox.tag', 'NONE', 'NONE', '1.20.2', 'busybox version 1.20.2', 'summary', 'Person:NOASSERTION', 'Person:NOASSERTION', 'NO ASSERTION', 'NO ASSERTION', 'package_checksum', 'checksum_algorithm', 'http://spdxhub.ist.unomaha.edu/spdx_docs/2', 'source_info', 'license_info_from_files', 'license_comments', 'verification_code', 'excludedFile', '2014-02-23 00:00:00', '2014-02-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `package_files`
--

CREATE TABLE IF NOT EXISTS `package_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_copyright_text` text NOT NULL,
  `artifact_of_project_name` varchar(255) NOT NULL,
  `artifact_of_project_homepage` varchar(255) NOT NULL,
  `artifact_of_project_uri` varchar(255) NOT NULL,
  `license_concluded` varchar(255) NOT NULL,
  `license_info_in_file` text NOT NULL,
  `file_checksum` varchar(255) NOT NULL,
  `file_checksum_algorithm` varchar(255) NOT NULL,
  `relative_path` varchar(255) NOT NULL,
  `license_comments` text NOT NULL,
  `file_notice` text NOT NULL,
  `file_contributor` text NOT NULL,
  `file_dependency` text NOT NULL,
  `file_comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_product_id` (`parent_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_software`
--

CREATE TABLE IF NOT EXISTS `product_software` (
  `software_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`software_id`,`product_id`,`package_id`),
  KEY `product_id` (`product_id`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE IF NOT EXISTS `reviewers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer_date` datetime NOT NULL,
  `reviewer_comment` text NOT NULL,
  `spdx_doc_id` int(11) NOT NULL,
  `reviewer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spdx_doc_id` (`spdx_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `software_name` varchar(255) NOT NULL,
  `software_version` varchar(255) NOT NULL,
  `software_description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `software_name`, `software_version`, `software_description`, `created_at`, `updated_at`) VALUES
(12, 'Apache', '2.2.8', 'Web server application.', '2014-02-24 18:42:39', '2014-02-24 18:42:39'),
(13, 'Busy Box', '1.20.2', 'busy box.', '2014-02-24 18:59:56', '2014-02-24 18:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `spdx_docs`
--

CREATE TABLE IF NOT EXISTS `spdx_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spdx_version` varchar(255) NOT NULL,
  `data_license` varchar(255) NOT NULL,
  `upload_file_name` varchar(255) NOT NULL,
  `upload_content_type` varchar(255) NOT NULL,
  `upload_file_size` varchar(255) NOT NULL,
  `upload_updated_at` datetime DEFAULT NULL,
  `document_comment` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creators`
--
ALTER TABLE `creators`
  ADD CONSTRAINT `creators_ibfk_3` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `creators_ibfk_1` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `creators_ibfk_2` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`);

--
-- Constraints for table `doc_file_package_associations`
--
ALTER TABLE `doc_file_package_associations`
  ADD CONSTRAINT `doc_file_package_associations_ibfk_9` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_1` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_3` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_4` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_5` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_6` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_7` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_file_package_associations_ibfk_8` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `doc_license_associations`
--
ALTER TABLE `doc_license_associations`
  ADD CONSTRAINT `doc_license_associations_ibfk_11` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_1` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_10` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_2` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_3` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_4` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_5` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_6` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_7` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_8` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `doc_license_associations_ibfk_9` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`id`),
  ADD CONSTRAINT `fk_spdx_docs_id` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`);

--
-- Constraints for table `licensings`
--
ALTER TABLE `licensings`
  ADD CONSTRAINT `licensings_ibfk_6` FOREIGN KEY (`doc_license_association_id`) REFERENCES `doc_license_associations` (`id`),
  ADD CONSTRAINT `fk_doc_license_associations_id` FOREIGN KEY (`doc_license_association_id`) REFERENCES `doc_license_associations` (`id`),
  ADD CONSTRAINT `fk_package_files_id` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`),
  ADD CONSTRAINT `licensings_ibfk_1` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`),
  ADD CONSTRAINT `licensings_ibfk_2` FOREIGN KEY (`doc_license_association_id`) REFERENCES `doc_license_associations` (`id`),
  ADD CONSTRAINT `licensings_ibfk_3` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`),
  ADD CONSTRAINT `licensings_ibfk_4` FOREIGN KEY (`doc_license_association_id`) REFERENCES `doc_license_associations` (`id`),
  ADD CONSTRAINT `licensings_ibfk_5` FOREIGN KEY (`package_file_id`) REFERENCES `package_files` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`parent_product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_software`
--
ALTER TABLE `product_software`
  ADD CONSTRAINT `product_software_ibfk_5` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `product_software_ibfk_1` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  ADD CONSTRAINT `product_software_ibfk_2` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  ADD CONSTRAINT `product_software_ibfk_3` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  ADD CONSTRAINT `product_software_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD CONSTRAINT `reviewers_ibfk_3` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `reviewers_ibfk_1` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`),
  ADD CONSTRAINT `reviewers_ibfk_2` FOREIGN KEY (`spdx_doc_id`) REFERENCES `spdx_docs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
