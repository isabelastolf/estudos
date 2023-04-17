CREATE SCHEMA `todolist` DEFAULT CHARACTER SET latin1 ;

CREATE TABLE `todolist`.`todos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `task_status` ENUM('ToDo', 'InProgress', 'Done') NOT NULL DEFAULT 'ToDo',
  `task_title` VARCHAR(50) NOT NULL,
  `task_description` TEXT NULL,
  `date_time` DATETIME NOT NULL DEFAULT TIMESTAMP(),
  PRIMARY KEY (`id`, `date_time`));

  CREATE TABLE `todolist`.`todos` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `task_status` ENUM('ToDo', 'InProgress', 'Done') NOT NULL DEFAULT 'ToDo',
  `task_title` VARCHAR(50) NOT NULL,
  `task_description` TEXT NULL,
  `date_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP());

