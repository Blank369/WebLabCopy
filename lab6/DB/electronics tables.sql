CREATE TABLE IF NOT EXISTS `goods` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`img_path` varchar(100) NOT NULL,
	`name` varchar(50) NOT NULL,
	`id_category` int NOT NULL,
	`id_brand` int NOT NULL,
	`description` varchar(300) NOT NULL,
	`price` float NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `category` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `brands` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `goods` ADD CONSTRAINT `goods_fk3` FOREIGN KEY (`id_category`) REFERENCES `category`(`id`);

ALTER TABLE `goods` ADD CONSTRAINT `goods_fk4` FOREIGN KEY (`id_brand`) REFERENCES `brands`(`id`);

