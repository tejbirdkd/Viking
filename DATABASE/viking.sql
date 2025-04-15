-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2025 at 12:53 PM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miking`
--

-- --------------------------------------------------------

--
-- Table structure for table `anchor_guard_system`
--

CREATE TABLE `anchor_guard_system` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `test_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `test_performed_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `anode_condition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `protective_coating_integrity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coaxial_layout`
--

CREATE TABLE `coaxial_layout` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `image` text,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dc_voltage_reading`
--

CREATE TABLE `dc_voltage_reading` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `anchor_one` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `anchor_two` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `anchor_three` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `anchor_four` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `anchor_five` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `anchor_six` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `measurementAnchor1` text,
  `measurementAnchor2` text,
  `measurementAnchor3` text,
  `measurementAnchor4` text,
  `measurementAnchor5` text,
  `measurementAnchor6` text,
  `observation` text,
  `notes_of_system_performance` text,
  `sign_of_degradation` text,
  `conclusions_and_recommendation` text,
  `summary_of_findings` text,
  `corrective_action_required` text,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deficiency_schedule`
--

CREATE TABLE `deficiency_schedule` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `deficiency` text,
  `elevation` text,
  `location` text,
  `notes` text,
  `category` text,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guyed_anchor_compounds`
--

CREATE TABLE `guyed_anchor_compounds` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `inspection_item` text,
  `item_condition` text,
  `item_number_notes` text,
  `notes` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_issues`
--

CREATE TABLE `maintenance_issues` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `priority` enum('critical','non-critical') DEFAULT NULL,
  `observation` text,
  `recommendation` text,
  `uploaded_image` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_issues_tower`
--

CREATE TABLE `maintenance_issues_tower` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `category_description` text,
  `non_compliant_item` text,
  `photo` text,
  `status` int DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_condition_checklist`
--

CREATE TABLE `site_condition_checklist` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `inspection_item` text,
  `item_condition` text,
  `item_number_notes` text,
  `notes` text,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structural_issues`
--

CREATE TABLE `structural_issues` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `priority` enum('critical','non-critical') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `recommendation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `uploaded_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure_conditions_checklist`
--

CREATE TABLE `structure_conditions_checklist` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `inspection_item` text,
  `item_condition` text,
  `item_number_notes` text,
  `notes` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `status`, `view`, `created_at`) VALUES
(1, 'admin@gmail.com', '7ca7d45a8f367a8719eeedca0accb914', 1, 1, '2025-04-03 08:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anchor_last`
--

CREATE TABLE `tbl_anchor_last` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `guy_elev` varchar(255) DEFAULT NULL,
  `wire_size` varchar(255) DEFAULT NULL,
  `anchor_distance` varchar(255) DEFAULT NULL,
  `type_strand` varchar(255) DEFAULT NULL,
  `initial_tension` varchar(255) DEFAULT NULL,
  `desired_tension` varchar(255) DEFAULT NULL,
  `measured_tension` varchar(255) DEFAULT NULL,
  `guy_star` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tension_plumb_and_twist`
--

CREATE TABLE `tension_plumb_and_twist` (
  `id` int NOT NULL,
  `inspection_id` int DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `site_address` varchar(255) DEFAULT NULL,
  `date_completed` varchar(255) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `wind_speed` varchar(255) DEFAULT NULL,
  `wind_direction` varchar(255) DEFAULT NULL,
  `completed_by` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tower_inspection`
--

CREATE TABLE `tower_inspection` (
  `id` int NOT NULL,
  `inspection_date` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `inspector_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inspection_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tower_owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tower_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tower_id_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tower_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tower_height` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year_of_construction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tower_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `structural_critical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `structural_non_critical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `maintenance_critical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `maintenance_non_critical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `form_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anchor_guard_system`
--
ALTER TABLE `anchor_guard_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaxial_layout`
--
ALTER TABLE `coaxial_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_voltage_reading`
--
ALTER TABLE `dc_voltage_reading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deficiency_schedule`
--
ALTER TABLE `deficiency_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_issues`
--
ALTER TABLE `maintenance_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inspection_id` (`inspection_id`);

--
-- Indexes for table `maintenance_issues_tower`
--
ALTER TABLE `maintenance_issues_tower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_condition_checklist`
--
ALTER TABLE `site_condition_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structural_issues`
--
ALTER TABLE `structural_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inspection_id` (`inspection_id`),
  ADD KEY `priority` (`priority`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_anchor_last`
--
ALTER TABLE `tbl_anchor_last`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tension_plumb_and_twist`
--
ALTER TABLE `tension_plumb_and_twist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tower_inspection`
--
ALTER TABLE `tower_inspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anchor_guard_system`
--
ALTER TABLE `anchor_guard_system`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coaxial_layout`
--
ALTER TABLE `coaxial_layout`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dc_voltage_reading`
--
ALTER TABLE `dc_voltage_reading`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deficiency_schedule`
--
ALTER TABLE `deficiency_schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_issues`
--
ALTER TABLE `maintenance_issues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_issues_tower`
--
ALTER TABLE `maintenance_issues_tower`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_condition_checklist`
--
ALTER TABLE `site_condition_checklist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `structural_issues`
--
ALTER TABLE `structural_issues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_anchor_last`
--
ALTER TABLE `tbl_anchor_last`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tension_plumb_and_twist`
--
ALTER TABLE `tension_plumb_and_twist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tower_inspection`
--
ALTER TABLE `tower_inspection`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
