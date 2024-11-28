-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 10 2024 г., 01:19
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `electronics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Acer'),
(2, 'ADATA'),
(3, 'AMD'),
(4, 'Defender'),
(5, 'GIGABYTE'),
(6, 'Intel'),
(7, 'Lenovo'),
(8, 'MSI'),
(9, 'Xiaomi'),
(10, 'X-Computers');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Компьютеры'),
(2, 'Ноутбуки'),
(3, 'Аксессуары'),
(4, 'SSD-накопител'),
(5, 'Видеокарты'),
(6, 'Процессоры');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `img_path`, `name`, `id_category`, `id_brand`, `description`, `price`) VALUES
(1, 'pic/goods/accessoryDEFENDER1.webp', 'Сумка для ноутбука Defender 26084', 3, 4, '15.6\", полиэстер, черная', 960),
(2, 'pic/goods/accessoryLENOVO1.webp', 'Крепление Lenovo Tiny VESA Mount II', 3, 7, 'Крепление на монитор, Для пк, Металл, Черная', 2388),
(3, 'pic/goods/computerACER1.webp', 'Рабочая станция Acer Altos P10 F8 20L Tower', 1, 1, 'Intel Core i7 12700 (12/20; 2,1GHz; 25MB)/16GB/512 Гб SSD nVidia Quadro T10008Гб/mouse/500W/noOS/черный', 149094),
(4, 'pic/goods/computerX1.webp', 'Компьютер X-Computers *Gamer Advanced*', 1, 10, 'Intel Core i5 12400F (6/12; 2,5GHz; 18MB)/16GB/512 Гб SSD nVidia GeForce RTX 306012Гб/GbitEth/WiFi/BT/600W/noOS/черный', 91281),
(5, 'pic/goods/computerX2.webp', 'Компьютер X-Computers *X-Special*', 1, 10, 'Intel Core i5 12500 (6/12; 3GHz; 18MB)/32GB/512 Гб SSD/Intel UHD Graphics 770 /GbitEth/600W/noOS/черный', 49900),
(6, 'pic/goods/CPU_AMD1.webp', 'Процессор AMD Ryzen 5 5600G', 6, 3, 'Cezanne 6C/12T 3.9GHz-4.4GHz (AM4, 16MB L3, 7nm) DIMM DDR4', 13549),
(7, 'pic/goods/CPU_AMD2.webp', 'Процессор AMD RYZEN X8 R7-7700 в Волгограде', 6, 3, 'Raphael AM5 8C/16T 3.8GHz-5.3GHz (AM5, 32MB L3, 5nm) DIMM DDR5 ECC', 26832),
(8, 'pic/goods/CPU_INTEL1.webp', 'Процессор Intel Core i5-12400', 6, 6, 'Alder Lake-S 6C/12T 2.5GHz-4.4GHz (LGA1700, 18MB L3, 10nm) DIMM DDR5, DIMM DDR4', 14571),
(9, 'pic/goods/CPU_INTEL2.webp', 'Процессор Intel Core i3-10100', 6, 6, 'Comet Lake 4C/8T 3.6GHz-4.3GHz (LGA1200, 6MB L3, 14nm) DIMM DDR4', 10795),
(10, 'pic/goods/laptopACER1.webp', 'Ноутбук Acer Travel Mate P2 TMP214-53', 2, 1, 'Core i5 1135G7/16 Гб/512 Гб SSD/Iris Xe Graphics/14\" Full HD (1920 x 1080) IPS/BT/WiFi/cam/без ОС/черный', 57677),
(11, 'pic/goods/laptopLENOVO1.webp', 'Ноутбук Lenovo ThinkBook 13s Gen 2', 2, 7, 'Core i7 1165G7/16 Гб/512 Гб SSD/Iris Xe Graphics/13.3\" 2K (2560 x 1600) IPS/BT/WiFi/cam/Win11Pro/серый', 109091),
(12, 'pic/goods/laptopLENOVO2.webp', 'Ноутбук Lenovo IdeaPad Slim 3 16IAH8', 2, 7, 'Core i5 12450H/16 Гб/512 Гб SSD/UHD Graphics/16\" Full HD (1920 x 1200) IPS/BT/WiFi/cam/без ОС/серый', 59660),
(13, 'pic/goods/laptopMSI1.webp', 'Ноутбук MSI GF63 Thin 12UC-1036XRU', 2, 8, 'Core i5 12450H/16 Гб/512 Гб SSD/GeForce RTX 3050 4 Гб/15.6\" Full HD (1920 x 1080) IPS/BT/WiFi/cam/без ОС/черный', 81795),
(14, 'pic/goods/SSD_ADATA1.webp', 'Накопитель SSD M.2 2280 ADATA ALEG-960M-1TCS', 4, 2, '1000 ГБ, PCIe 4.0 x4 М.2 2280, TLC, 7400 Мб/с, 6000 Мб/с, 780 TBW', 10634),
(15, 'pic/goods/SSD_ADATA2.webp', 'Накопитель SSD 2.5\' ADATA ASU650SS-256GT-R', 4, 2, '256 ГБ, SATA III 2.5\", TLC, 520 Мб/с, 450 Мб/с, 140 TBW', 2067),
(16, 'pic/goods/SSD_AMD1.webp', 'Накопитель SSD 2.5\' AMD R5SL120G', 4, 3, 'Radeon R5 120GB TLC 3D NAND SATA 6Gb/s 544/349MB/s 7mm RTL', 1465),
(17, 'pic/goods/SSD_INTEL1.webp', 'Накопитель SSD 2.5\' Intel SSDSC2KB960G801', 4, 6, 'D3-S4510 960GB TLC 3D2 SATA 6Gb/s 560/510MB/s 95K/36K IOPS 7mm Single Pack', 20675),
(18, 'pic/goods/videocardACER1.webp', 'Видеокарта PCI-E Acer Radeon RX 7800 XT Nitro OC', 5, 1, '16384Мб/GDDR6/256бит/19500МГц/5нм/1295МГц/PCI-E x16', 64085),
(19, 'pic/goods/videocardGIGABYTE1.webp', 'Видеокарта PCI-E GIGABYTE GeForce RTX 3060 WINDFOR', 5, 5, '12288Мб/GDDR6/192бит/15000МГц/8нм/1320МГц/PCI-E x16', 34467),
(20, 'pic/goods/videocardGIGABYTE2.webp', 'Видеокарта PCI-E GIGABYTE GeForce RTX 4060 WINDFOR', 5, 5, '8192Мб/GDDR6/128бит/17000МГц/4нм/1830МГц/PCI-E x8', 39356),
(21, 'pic/goods/videocardMSI1.webp', 'Видеокарта PCI-E MSI GeForce RTX 3050 VENTUS 2X XS', 5, 8, '8192Мб/GDDR6/128бит/14000МГц/8нм/1552МГц/PCI-E x8', 30430);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `goods_fk3` (`id_category`),
  ADD KEY `goods_fk4` (`id_brand`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_fk3` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `goods_fk4` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
