-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 07:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kdm_applicant_agent`
--

CREATE TABLE `kdm_applicant_agent` (
  `id` int(255) NOT NULL,
  `applicant_id` int(50) NOT NULL,
  `agent_id` int(50) DEFAULT NULL,
  `agent_title` varchar(3) NOT NULL,
  `agent_first_name` text NOT NULL,
  `agent_last_name` text NOT NULL,
  `agent_gender` text NOT NULL,
  `agent_mobile_number` int(20) NOT NULL,
  `agent_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kdm_applicant_bio_data`
--

CREATE TABLE `kdm_applicant_bio_data` (
  `id` int(255) NOT NULL,
  `applicant_id` int(50) NOT NULL,
  `title` char(3) NOT NULL,
  `image` varchar(200) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `occupation` text NOT NULL,
  `nationality` text NOT NULL,
  `state_of_origin` text NOT NULL,
  `local_government_of_origin` text NOT NULL,
  `marital_status` text NOT NULL,
  `highest_education` text NOT NULL,
  `stage_status` int(2) NOT NULL,
  `verification_status` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kdm_contact_details`
--

CREATE TABLE `kdm_contact_details` (
  `id` int(255) NOT NULL,
  `applicant_id` int(50) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `email` text NOT NULL,
  `mobile_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kdm_declaration`
--

CREATE TABLE `kdm_declaration` (
  `id` int(255) NOT NULL,
  `applicant_id` int(50) NOT NULL,
  `declaration` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kdm_document_upload`
--

CREATE TABLE `kdm_document_upload` (
  `id` int(255) NOT NULL,
  `applicant_id` int(50) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kdm_next_of_kin`
--

CREATE TABLE `kdm_next_of_kin` (
  `id` int(255) NOT NULL,
  `applicant_id` int(50) NOT NULL,
  `relationship` text NOT NULL,
  `title` varchar(3) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `mobile_number` int(20) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kdm_applicant_agent`
--
ALTER TABLE `kdm_applicant_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kdm_applicant_bio_data`
--
ALTER TABLE `kdm_applicant_bio_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kdm_contact_details`
--
ALTER TABLE `kdm_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kdm_declaration`
--
ALTER TABLE `kdm_declaration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kdm_document_upload`
--
ALTER TABLE `kdm_document_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kdm_next_of_kin`
--
ALTER TABLE `kdm_next_of_kin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kdm_applicant_agent`
--
ALTER TABLE `kdm_applicant_agent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdm_applicant_bio_data`
--
ALTER TABLE `kdm_applicant_bio_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdm_contact_details`
--
ALTER TABLE `kdm_contact_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdm_declaration`
--
ALTER TABLE `kdm_declaration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdm_document_upload`
--
ALTER TABLE `kdm_document_upload`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdm_next_of_kin`
--
ALTER TABLE `kdm_next_of_kin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
