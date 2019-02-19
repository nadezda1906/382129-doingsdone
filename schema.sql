CREATE DATABASE doingsdone
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci
USE doingsdone;

CREATE TABLE `users` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `registered_at` datetime NOT NULL,
 `email` char(255) NOT NULL,
 `name` varchar(255) NOT NULL,
 `password` char(64) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`),
 UNIQUE KEY `registered_at` (`registered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tasks` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `created_at` datetime NOT NULL,
 `update_at` datetime NOT NULL,
 `status` tinyint(1) NOT NULL,
 `file` char(64) NOT NULL,
 `completed_at` datetime NOT NULL,
 `name` varchar(255) NOT NULL,
 `project_id` INT(11) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `created_at` (`created_at`),
 UNIQUE KEY `update_at` (`update_at`),
 UNIQUE KEY `completed_at` (`completed_at`),
 KEY `c_text` (`name`),
 KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `projects` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `user_id` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `c_text` (`name`),
 KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;