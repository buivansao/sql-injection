BEGIN;
CREATE TABLE `teachers` (
	`id`	INTEGER PRIMARY KEY AUTO_INCREMENT,
	`first_name`	TEXT,
	`last_name`	TEXT,
	`password`	TEXT
);
INSERT INTO teachers VALUES(1,'John','Travolta','password123');
INSERT INTO teachers VALUES(2,'Albert','Einstein','relat!vity');
INSERT INTO teachers VALUES(3,'William','Wallace','fre3dom!');
INSERT INTO teachers VALUES(4,'Jean Luc','Picard','3ngage<>');


CREATE TABLE `subjects` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name`	TEXT NOT NULL
);
INSERT INTO subjects VALUES(1,'Maths');
INSERT INTO subjects VALUES(2,'English');
INSERT INTO subjects VALUES(3,'Science');
INSERT INTO subjects VALUES(4,'History');

CREATE TABLE `qualifications` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`subject_id`	INTEGER NOT NULL,
	`student_id`	INTEGER NOT NULL,
	`term_id`	TEXT NOT NULL,
	`teacher_id`	INTEGER NOT NULL,
	`qualification`	REAL NOT NULL,
	`qualification_date`	TEXT NOT NULL,
	`is_final`	INTEGER NOT NULL
);
INSERT INTO qualifications VALUES(1,1,1,'1',1,8.0999999999999996447,'2020-02-01',0);
INSERT INTO qualifications VALUES(2,1,2,'1',1,7.0999999999999996447,'2020-02-01',0);
INSERT INTO qualifications VALUES(3,1,3,'1',1,9.3000000000000007105,'2020-02-01',0);
INSERT INTO qualifications VALUES(4,1,4,'1',1,4.25,'2020-02-01',0);
INSERT INTO qualifications VALUES(5,1,5,'1',1,6.7999999999999998223,'2020-02-01',0);
INSERT INTO qualifications VALUES(6,1,6,'1',1,10.0,'2020-02-01',0);
INSERT INTO qualifications VALUES(7,1,7,'1',1,8.0,'2020-02-01',0);
INSERT INTO qualifications VALUES(8,1,9,'1',1,5.75,'2020-02-01',0);
INSERT INTO qualifications VALUES(9,1,10,'1',1,3.25,'2020-02-01',0);


CREATE TABLE `terms` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`year`	INTEGER NOT NULL,
	`term_no`	INTEGER NOT NULL
);
INSERT INTO terms VALUES(1,2020,1);
INSERT INTO terms VALUES(2,2020,2);
INSERT INTO terms VALUES(3,2020,3);

CREATE TABLE `class_lists` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`term_id`	INTEGER NOT NULL,
	`subject_id`	INTEGER NOT NULL,
	`student_id`	INTEGER NOT NULL
);
INSERT INTO class_lists VALUES(1,1,1,1);
INSERT INTO class_lists VALUES(2,1,1,2);
INSERT INTO class_lists VALUES(3,1,1,3);
INSERT INTO class_lists VALUES(4,1,1,4);
INSERT INTO class_lists VALUES(5,1,1,5);
INSERT INTO class_lists VALUES(6,1,1,6);
INSERT INTO class_lists VALUES(7,1,1,7);
INSERT INTO class_lists VALUES(8,1,1,8);
INSERT INTO class_lists VALUES(9,1,1,9);
INSERT INTO class_lists VALUES(10,1,1,10);
INSERT INTO class_lists VALUES(11,2,1,1);
INSERT INTO class_lists VALUES(12,2,1,2);
INSERT INTO class_lists VALUES(13,2,1,3);
INSERT INTO class_lists VALUES(14,2,1,4);
INSERT INTO class_lists VALUES(15,2,1,5);
INSERT INTO class_lists VALUES(16,2,1,6);
INSERT INTO class_lists VALUES(17,2,1,7);
INSERT INTO class_lists VALUES(18,2,1,8);
INSERT INTO class_lists VALUES(19,2,1,9);
INSERT INTO class_lists VALUES(20,2,1,10);
INSERT INTO class_lists VALUES(21,3,1,1);
INSERT INTO class_lists VALUES(22,3,1,2);
INSERT INTO class_lists VALUES(23,3,1,3);
INSERT INTO class_lists VALUES(24,3,1,4);
INSERT INTO class_lists VALUES(25,3,1,5);
INSERT INTO class_lists VALUES(26,3,1,6);
INSERT INTO class_lists VALUES(27,3,1,7);
INSERT INTO class_lists VALUES(28,3,1,8);
INSERT INTO class_lists VALUES(29,3,1,9);
INSERT INTO class_lists VALUES(30,3,1,10);
INSERT INTO class_lists VALUES(31,3,2,1);
INSERT INTO class_lists VALUES(32,3,2,2);
INSERT INTO class_lists VALUES(33,3,2,3);
INSERT INTO class_lists VALUES(34,3,2,4);
INSERT INTO class_lists VALUES(35,3,2,5);
INSERT INTO class_lists VALUES(36,3,2,6);
INSERT INTO class_lists VALUES(37,3,2,7);
INSERT INTO class_lists VALUES(38,3,2,8);
INSERT INTO class_lists VALUES(39,3,2,9);
INSERT INTO class_lists VALUES(40,3,2,10);
INSERT INTO class_lists VALUES(41,2,2,1);
INSERT INTO class_lists VALUES(42,2,2,2);
INSERT INTO class_lists VALUES(43,2,2,3);
INSERT INTO class_lists VALUES(44,2,2,4);
INSERT INTO class_lists VALUES(45,2,2,5);
INSERT INTO class_lists VALUES(46,2,2,6);
INSERT INTO class_lists VALUES(47,2,2,7);
INSERT INTO class_lists VALUES(48,2,2,8);
INSERT INTO class_lists VALUES(49,2,2,9);
INSERT INTO class_lists VALUES(50,2,2,10);
INSERT INTO class_lists VALUES(51,1,2,1);
INSERT INTO class_lists VALUES(52,1,2,2);
INSERT INTO class_lists VALUES(53,1,2,3);
INSERT INTO class_lists VALUES(54,1,2,4);
INSERT INTO class_lists VALUES(55,1,2,5);
INSERT INTO class_lists VALUES(56,1,2,6);
INSERT INTO class_lists VALUES(57,1,2,7);
INSERT INTO class_lists VALUES(58,1,2,8);
INSERT INTO class_lists VALUES(59,1,2,9);
INSERT INTO class_lists VALUES(60,1,2,10);
INSERT INTO class_lists VALUES(61,1,3,1);
INSERT INTO class_lists VALUES(62,1,3,2);
INSERT INTO class_lists VALUES(63,1,3,3);
INSERT INTO class_lists VALUES(64,1,3,4);
INSERT INTO class_lists VALUES(65,1,3,5);
INSERT INTO class_lists VALUES(66,1,3,6);
INSERT INTO class_lists VALUES(67,1,3,7);
INSERT INTO class_lists VALUES(68,1,3,8);
INSERT INTO class_lists VALUES(69,1,3,9);
INSERT INTO class_lists VALUES(70,1,3,10);
INSERT INTO class_lists VALUES(71,2,3,1);
INSERT INTO class_lists VALUES(72,2,3,2);
INSERT INTO class_lists VALUES(73,2,3,3);
INSERT INTO class_lists VALUES(74,2,3,4);
INSERT INTO class_lists VALUES(75,2,3,5);
INSERT INTO class_lists VALUES(76,2,3,6);
INSERT INTO class_lists VALUES(77,2,3,7);
INSERT INTO class_lists VALUES(78,2,3,8);
INSERT INTO class_lists VALUES(79,2,3,9);
INSERT INTO class_lists VALUES(80,2,3,10);
INSERT INTO class_lists VALUES(81,3,3,1);
INSERT INTO class_lists VALUES(82,3,3,2);
INSERT INTO class_lists VALUES(83,3,3,3);
INSERT INTO class_lists VALUES(84,3,3,4);
INSERT INTO class_lists VALUES(85,3,3,5);
INSERT INTO class_lists VALUES(86,3,3,6);
INSERT INTO class_lists VALUES(87,3,3,7);
INSERT INTO class_lists VALUES(88,3,3,8);
INSERT INTO class_lists VALUES(89,3,3,9);
INSERT INTO class_lists VALUES(90,3,3,10);
INSERT INTO class_lists VALUES(91,3,4,1);
INSERT INTO class_lists VALUES(92,3,4,2);
INSERT INTO class_lists VALUES(93,3,4,3);
INSERT INTO class_lists VALUES(94,3,4,4);
INSERT INTO class_lists VALUES(95,3,4,5);
INSERT INTO class_lists VALUES(96,3,4,6);
INSERT INTO class_lists VALUES(97,3,4,7);
INSERT INTO class_lists VALUES(98,3,4,8);
INSERT INTO class_lists VALUES(99,3,4,9);
INSERT INTO class_lists VALUES(100,3,4,10);
INSERT INTO class_lists VALUES(101,2,4,1);
INSERT INTO class_lists VALUES(102,2,4,2);
INSERT INTO class_lists VALUES(103,2,4,3);
INSERT INTO class_lists VALUES(104,2,4,4);
INSERT INTO class_lists VALUES(105,2,4,5);
INSERT INTO class_lists VALUES(106,2,4,6);
INSERT INTO class_lists VALUES(107,2,4,7);
INSERT INTO class_lists VALUES(108,2,4,8);
INSERT INTO class_lists VALUES(109,2,4,9);
INSERT INTO class_lists VALUES(110,2,4,10);
INSERT INTO class_lists VALUES(111,1,4,1);
INSERT INTO class_lists VALUES(112,1,4,2);
INSERT INTO class_lists VALUES(113,1,4,3);
INSERT INTO class_lists VALUES(114,1,4,4);
INSERT INTO class_lists VALUES(115,1,4,5);
INSERT INTO class_lists VALUES(116,1,4,6);
INSERT INTO class_lists VALUES(117,1,4,7);
INSERT INTO class_lists VALUES(118,1,4,8);
INSERT INTO class_lists VALUES(119,1,4,9);
INSERT INTO class_lists VALUES(120,1,4,10);


CREATE TABLE `staffing_plan` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`teacher_id`	INTEGER NOT NULL,
	`term_id`	INTEGER NOT NULL,
	`subject_id`	INTEGER NOT NULL,
	`is_main_teacher`	INTEGER NOT NULL
);
INSERT INTO staffing_plan VALUES(1,1,1,1,1);
INSERT INTO staffing_plan VALUES(2,1,2,1,1);
INSERT INTO staffing_plan VALUES(3,1,3,1,1);
INSERT INTO staffing_plan VALUES(4,4,1,2,1);
INSERT INTO staffing_plan VALUES(5,4,2,2,1);
INSERT INTO staffing_plan VALUES(6,4,3,2,1);
INSERT INTO staffing_plan VALUES(7,2,1,3,1);
INSERT INTO staffing_plan VALUES(8,2,2,3,1);
INSERT INTO staffing_plan VALUES(9,2,3,3,1);
INSERT INTO staffing_plan VALUES(10,3,1,4,1);
INSERT INTO staffing_plan VALUES(11,3,2,4,1);
INSERT INTO staffing_plan VALUES(12,3,3,4,1);


CREATE TABLE `students` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`first_name`	TEXT NOT NULL,
	`last_name`	TEXT NOT NULL,
	`birth_date`	TEXT NOT NULL,
	`address`	TEXT,
	`postcode`	TEXT,
	`city`	TEXT,
	`state`	TEXT,
	`country`	TEXT,
	`hidden`	INTEGER NOT NULL DEFAULT 0
);
INSERT INTO students VALUES(1,'Desiree','Joubert','2007-04-01',NULL,'','','','', 0);
INSERT INTO students VALUES(2,'Blythe','Weatherall','2007-05-10',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(3,'Felisha','Bookman','2006-03-12',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(4,'Natacha','Pua','2007-11-23',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(5,'Chante','Fenske','2007-12-28',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(6,'Amado','Grimaldi','2007-06-18',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(7,'Valery','Files','2007-03-08',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(8,'Taryn','Carbone','2007-08-01',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(9,'Julissa','Spengler','2007-01-31',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(10,'Brain','Spagnuolo','2007-09-23',NULL,NULL,NULL,NULL,NULL,0);
INSERT INTO students VALUES(11,'Hidden','Student','2001-01-01',NULL,NULL,NULL,NULL,NULL,1);

COMMIT;
