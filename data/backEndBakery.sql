SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Create database: `backend`
--

CREATE DATABASE IF NOT EXISTS `backend` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `backend`;

DROP TABLE IF EXISTS `Supplies`;

--
-- Create table
--

CREATE TABLE `Supplies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `qty_onhand` decimal(10,2) NOT NULL,
  `qty_inventory` decimal(10,2) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Supplies` (`name`, `qty_onhand`, `qty_inventory`, `price`)
VALUES
('Flour', 10000, 30000,  15),
('Baking powder', 18000, 10000,  40),
('Baking soda', 150000, 10000,  50),
('Whipping cream', 7000, 15000,  100),
('Lime juice', 6000, 18000,  75),
('Ground graham crackers', 4000, 12000,  100),
('Sweetened condensed milk', 8000, 10000, 100),
('Lime zest', 2000, 4000,  78),
('Buttermilk', 10000, 20000,  177),
('Pepitas', 2000, 9000,  54),
('Onion', 7000, 20000,  70),
('Red bell pepper', 5000, 9000,  88),
('Red wine vinegar', 2000, 6000,  77),
('Honey', 1000, 4000,  146),
('Olive oil', 2000, 8000,  328),
('Ground cumin', 600, 270,  88),
('Smoked paprika', 700, 330,  49),
('Salt', 220, 600, 70),
('Sugar', 10000, 10000, 80),
('Butter', 1000, 2000, 90),
('Egg', 2000, 2000,  380),
('Ground cinnamon', 120, 700, 86),
('Whole milk', 4000, 4000, 729),
('Apple', 3000, 30000, 150),
('Almond flour', 900, 730, 68),
('Coconut flour', 170, 150, 43),
('Vanilla extract', 130, 580,  82),
('Tapioca starch', 120, 150, 22),
('Sweetened dried cranberries', 240, 880, 100),
('Orange zest', 500, 700, 33),
('Brandy', 100, 200, 73),
('Nutmeg', 150, 500, 55),
('Allspice', 130, 500, 96),
('Eggnog', 1000, 1000, 260),
('Orange juice', 170, 660, 55),
('Dark rum', 300, 300, 27),
('Water', 1000, 1200, 188),
('Rolled oats', 330, 600, 68),
('Raw walnuts', 270, 160, 73),
('Chia seed', 500, 300, 43),
('Banana', 1000, 2000, 150),
('Sour cream', 200, 120, 77),
('Blackberry', 270, 300, 52),
('Graham cracker crumbs', 600, 700, 90),
('Cream cheese', 800, 1000, 22),
('Raspberry',500 ,400 , 122);