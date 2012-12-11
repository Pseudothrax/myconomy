DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	`id` 			INT 			UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` 		VARCHAR(50) 	NOT NULL,
    `password` 		VARCHAR(50) 	NOT NULL,
	`type`			VARCHAR(25) 	NOT NULL,
  	`last_name` 	VARCHAR(25) 	NOT NULL,
  	`first_name` 	VARCHAR(25) 	NOT NULL,
  	`email` 		VARCHAR(50) 	NOT NULL UNIQUE,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (id,username,password,type,last_name,first_name,email) VALUES (0,'admin','10ae7242549c7b81071999e5ccdf45048f85b57a','admin','Admin','Sample','admin@myconomy.net');
INSERT INTO `users` (id,username,password,type,last_name,first_name,email) VALUES (0,'instructor','b63ed59920f356ae365f0f8be0965d85942ed8b4','instructor','Instructor','Sample','instructor@myconomy.net');
INSERT INTO `users` (id,username,password,type,last_name,first_name,email) VALUES (0,'student','35407cf4ebfab38c3e804f05e231ccae6ec045dd','student','Student','Sample','student@myconomy.net');

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`to_id`			INT UNSIGNED	NOT NULL,
	`from_id`		INT UNSIGNED 	NOT NULL,
	`type`			VARCHAR(25)		NOT NULL,
	`header`		VARCHAR(100)	NOT NULL,
	`message`		VARCHAR(255)	NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `simulations`;
CREATE TABLE `simulations` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`owner_id`		INT UNSIGNED 	NOT NULL,
	`name`			VARCHAR(50)		NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
	`id`			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`user_id` 		INT UNSIGNED 	NOT NULL,
	`simulation_id`	INT UNSIGNED 	NOT NULL,
	`balance`		FLOAT			DEFAULT 0.0 NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`name`			VARCHAR(50)		NOT NULL,
	`value`			FLOAT			DEFAULT 0.0 NOT NULL,
	`simulation_id` INT UNSIGNED	NOT NULL,
	`account_id`	INT UNSIGNED	DEFAULT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
    `start`         DATETIME        NOT NULL,
    `end`           DATETIME        NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `trades`;
CREATE TABLE `trades` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`simulation_id`  INT UNSIGNED    NOT NULL,
	`property_id`     INT UNSIGNED    NOT NULL,
    `from_id`        INT UNSIGNED    NOT NULL,
    `to_id`          INT UNSIGNED    NOT NULL,
    `amount`        DOUBLE          NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`simulation_id`  INT UNSIGNED    NOT NULL,
    `property_id`     INT UNSIGNED    NOT NULL,
    `owner_id`       INT UNSIGNED    NOT NULL,
    `maker_id`       INT UNSIGNED    NOT NULL,
    `amount`        DOUBLE          NOT NULL,
    `status`        VARCHAR(25)     NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
	`id` 			INT UNSIGNED 	AUTO_INCREMENT PRIMARY KEY,
	`description`   VARCHAR(100)    NOT NULL,
	`type`          VARCHAR(25)     NOT NULL,
    `created` 		DATETIME 		DEFAULT NULL,
    `modified` 		DATETIME 		DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;