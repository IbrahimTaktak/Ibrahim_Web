-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 08:58 PM
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
-- Database: `ibrahim_web`
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
(6, 1, 2, 'nooooooooooo', '2024-06-16', '16:48:17', '17:48:20'),
(9, 9, 15, 'ranoop', '2024-06-24', '14:15:43', '16:15:47'),
(10, 12, 17, 'lol', '2024-06-26', '10:18:15', '10:21:18'),
(12, 1, 18, 'asa', '2024-06-20', '12:24:10', '12:21:15'),
(13, 10, 18, 'asasas', '2024-06-19', '12:23:15', '12:23:19'),
(15, 13, 18, 'loooooooollsssssssssssss', '2024-06-12', '14:35:25', '14:37:27'),
(16, 19, 18, 'cscsc', '2024-06-30', '16:19:26', '19:19:27'),
(17, 1, 15, 'new progres 17/1/20024', '2024-07-01', '10:37:46', '11:37:51'),
(18, 13, 17, 'task2 progress', '2024-12-29', '20:29:57', '21:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `ProjectName` varchar(50) NOT NULL,
  `ProjectDescription` text NOT NULL,
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
(2, 'Project Beta', 'Description of Project Beta', 'Doing', 2, '2024-06-06 16:15:54', '2024-02-01', '2024-07-01'),
(3, 'Project Gamma', 'Description of Project Gamma', 'Done', 7, '2024-06-06 16:15:54', '2024-03-01', '2024-08-01'),
(10, 'Project test 2', 'Project test 2 ........', 'To Do', 17, '2024-06-25 14:15:48', '2024-06-29', '2024-06-19'),
(11, 'Project test 3', 'Project test 3............', 'Doing', 18, '2024-06-25 14:23:13', '2024-06-25', '2024-07-06');

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
(2, 1),
(2, 2),
(2, 3),
(3, 3),
(11, 13),
(11, 16),
(11, 20);

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
(3, 3),
(10, 17),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 7),
(11, 15),
(11, 16),
(11, 17);

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
(5, 'ibrahimm', 'zad', 'Done', 2, '2024-06-16 16:40:51', '2024-06-16', '2024-06-18'),
(6, 'Task test 1', 'Task test 1', 'To Do', 2, '2024-06-19 09:43:28', '2024-06-19', '2024-06-20'),
(9, 'page home', 'page', 'To Do', 15, '2024-06-24 11:14:06', '2024-06-24', '2024-06-25'),
(10, 'ggg', 'gggg', 'To Do', 18, '2024-06-25 15:09:16', '2024-06-20', '2024-07-04'),
(12, 'zdazdazd', 'azd', 'To Do', 18, '2024-06-25 18:45:31', '2024-06-26', '2024-06-26'),
(13, 'Task test 2', 'Task test 2', 'Done', 18, '2024-06-27 19:16:23', '2024-06-28', '2024-06-29'),
(16, 'Task test 4', 'Task test 4........', 'To Do', 18, '2024-06-30 09:48:29', '2024-07-01', '2024-07-03'),
(18, 'Task test 10', 'Task test 10', 'To Do', 22, '2024-06-30 12:26:18', '2024-06-21', '2024-06-13'),
(19, 'Task test 5', 'Task test 5', 'To Do', 18, '2024-06-30 13:50:48', '2024-06-15', '2024-07-04'),
(20, 'Task test 6', 'Task test 5........', 'To Do', 15, '2024-06-30 13:56:42', '2024-06-03', '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `UserRole` int(3) NOT NULL COMMENT '(1:admin,2:manager,3:employer)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UserName`, `email`, `password`, `UserRole`) VALUES
(1, 'Alice', 'alice@example.com', 'password1', 1),
(2, 'Bob', 'bob@example.com', '$2y$10$OliPnZd8zMitZmWY9bm0euX9lLYsfHZdKCKdPjXxJBBc0dt4On5Ky', 2),
(3, 'Charlie', 'charlie@example.com', 'password3', 3),
(4, 'David', 'david@example.com', 'password4', 3),
(5, 'Eve', 'eve@example.com', 'password5', 2),
(7, 'nour', 'barhoum.taktak@gmail.com', '1511987', 3),
(15, 'admin', 'admin@admin.com', '$2y$10$RX0JvuDjArzp3zql0sYyJ.Wj61f3EZiHpC/Ccuy8ImCrbk8tn6c/u', 1),
(16, 'kk', 'barhoum.takta5k@gmail.com', '$2y$10$NNSZntkssmJL4SEVybP7f.c1PjrQZVDLng2YikdaoZmab4c4kZj.2', 1),
(17, 'user', 'user@user.com', '$2y$10$2.xuul.tbMARL1KtpFr7O.TYOgOgdvr1WdqOdOdeYjPtgINI5DRY.', 3),
(18, 'manager', 'manager@manager.com', '$2y$10$nfuz1yoABZPfOSRY7puiwOTsPZEFq82qQjeqRTiItXl3HlxMNBD4S', 2),
(19, 'test', 'test@test.com', '$2y$10$qgwZdaWXJ./O770jaDQWUOQlZQbTU1gSqRHBW8m9jMLrxSJG7cW7.', 3),
(22, 'm', 'm@manager.com', '$2y$10$0zcbRQPFGH8X0whIykQujekf4r4P3aCN7L8eRCxLPYv6i5kA//mZ6', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
