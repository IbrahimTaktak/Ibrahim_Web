-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 03:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtd_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `task_id`, `user_id`, `Description`, `Date`, `StartTime`, `EndTime`) VALUES
(1, 1, 1, 'Progress on Task A by Alice', '2024-01-16', '09:00:00', '12:00:00'),
(2, 2, 2, 'Progress on Task B by Bob', '2024-01-21', '10:00:00', '14:00:00'),
(4, 1, 2, 'scsc', '2004-12-20', '18:39:46', '18:37:50'),
(6, 1, 2, 'nooooooooooo', '2024-06-16', '16:48:17', '17:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `ProjectName` varchar(50) NOT NULL,
  `ProjectDescription` varchar(500) NOT NULL,
  `ProjectStatus` enum('To Do','Doing','Done') NOT NULL,
  `user_id` int(11) NOT NULL,
  `ProjectCreatDate` datetime NOT NULL DEFAULT current_timestamp(),
  `ProjectStartDate` date NOT NULL,
  `ProjectEndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `ProjectName`, `ProjectDescription`, `ProjectStatus`, `user_id`, `ProjectCreatDate`, `ProjectStartDate`, `ProjectEndDate`) VALUES
(1, 'Project Alpha', 'Description of Project Alpha', 'To Do', 7, '2024-06-06 16:15:54', '2024-01-01', '2024-06-01'),
(2, 'Project Beta', 'Description of Project Beta', 'Doing', 7, '2024-06-06 16:15:54', '2024-02-01', '2024-07-01'),
(3, 'Project Gamma', 'Description of Project Gamma', 'Done', 7, '2024-06-06 16:15:54', '2024-03-01', '2024-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `projects_tasks`
--

CREATE TABLE `projects_tasks` (
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects_tasks`
--

INSERT INTO `projects_tasks` (`project_id`, `task_id`) VALUES
(1, 1),
(1, 5),
(1, 6),
(2, 2),
(2, 5),
(2, 6),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE `projects_users` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`project_id`, `user_id`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 5),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `TaskName` varchar(200) NOT NULL,
  `TaskDescription` text NOT NULL,
  `TaskStatus` enum('To Do','Doing','Done') NOT NULL,
  `user_id` int(11) NOT NULL,
  `TaskCreatDate` datetime NOT NULL DEFAULT current_timestamp(),
  `TaskStartDate` date NOT NULL,
  `TaskEndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `TaskName`, `TaskDescription`, `TaskStatus`, `user_id`, `TaskCreatDate`, `TaskStartDate`, `TaskEndDate`) VALUES
(1, 'Task A', 'Description of Task A.', 'To Do', 1, '2024-06-06 16:15:54', '2024-01-15', '2024-01-20'),
(2, 'Task B', 'Description of Task B', 'Doing', 2, '2024-06-06 16:15:54', '2024-01-20', '2024-01-25'),
(3, 'Task C', 'Description of Task C', 'Done', 3, '2024-06-06 16:15:54', '2024-01-25', '2024-01-30'),
(4, 'ad', 'dza', 'To Do', 7, '2024-06-16 16:03:41', '2024-06-16', '2024-06-23'),
(5, 'ibrahimm', 'zad', 'To Do', 2, '2024-06-16 16:40:51', '2024-06-16', '2024-06-18'),
(6, 'dv', 'dvdv', 'To Do', 2, '2024-06-19 09:43:28', '2024-06-19', '2024-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPassWord` text NOT NULL,
  `UserRole` int(3) NOT NULL COMMENT '(1:admin,2:manager,3:employer)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UserName`, `UserEmail`, `UserPassWord`, `UserRole`) VALUES
(1, 'Alice', 'alice@example.com', 'password1', 1),
(2, 'Bob', 'bob@example.com', 'password2', 2),
(3, 'Charlie', 'charlie@example.com', 'password3', 3),
(4, 'David', 'david@example.com', 'password4', 3),
(5, 'Eve', 'eve@example.com', 'password5', 2),
(7, 'nour', 'barhoum.taktak@gmail.com', '1511987', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects_tasks`
--
ALTER TABLE `projects_tasks`
  ADD PRIMARY KEY (`project_id`,`task_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_tasks`
--
ALTER TABLE `projects_tasks`
  ADD CONSTRAINT `projects_tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_tasks_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD CONSTRAINT `projects_users_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
