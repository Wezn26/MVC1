CREATE TABLE `news` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`title`	TEXT,
	`image`	TEXT,
	`content`	TEXT,
	`author`	TEXT,
	`date`	TEXT
);

CREATE TABLE `admin` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`login`	TEXT,
	`password`	TEXT
);