CREATE TABLE `contacts` (
  `id` INT AUTO_INCREMENT,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `name` VARCHAR(14),
  `last_name` VARCHAR(20),
  `description` VARCHAR(64),
  `escapes` INT,
  `screenshot` VARCHAR(64),
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE = MYISAM DEFAULT CHARSET = utf8;

INSERT INTO `contacts` VALUES (1, '2008-04-22 14:37:34', 'Paco', 'Jastorius', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 78, '01.jpg');
INSERT INTO `contacts` VALUES (2, '2008-04-22 21:27:54', 'Nevil', 'Johansson', 'Vivamus a nulla eu elit pharetra tristique et non dolor.', 32, '02.jpg');
INSERT INTO `contacts` VALUES (4, '2008-04-23 09:12:53', 'Belita', 'Chevy', 'Ut rutrum fermentum metus sit amet interdum.', 12, '03.jpg');
INSERT INTO `contacts` VALUES (6, '2008-04-23 14:09:50', 'Kenny', 'Lavitz', 'Praesent vitae mi magna.', 33, '04.jpg');
INSERT INTO `contacts` VALUES (7, '2008-04-24 08:13:52', 'Phiz', 'Lairston', 'In hac habitasse platea dictumst.', 11, '05.jpg');
INSERT INTO `contacts` VALUES (8, '2008-04-25 07:22:19', 'Jean', 'Paul Jones', 'Proin egestas venenatis accumsan.', 9, '06.jpg');
INSERT INTO `contacts` VALUES (9, '2008-04-25 11:49:23', 'Jacob', 'Scorcherson', 'Pellentesque fringilla justo vitae sapien cursus tempor luctus nisl ultrices.', 4, '07.jpg');
