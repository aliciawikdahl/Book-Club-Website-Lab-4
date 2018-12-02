<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Namnlöst dokument</title>
</head>
<body>
	<?php
	
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE book_club_website;
	
CREATE TABLE Books (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	title varchar(50) NOT NULL,
	publisher_id int(11) NOT NULL,
	publication_date date NOT NULL,
	isbn_number varchar(100) NOT NULL,
	pages_number int(4) NOT NULL,
	edition_number int(10) UNSIGNED NOT NULL,
	is_reserved tinyint(1) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Authors (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	first_name varchar(50) NOT NULL,
	last_name varchar(50) NOT NULL,
	URL varchar(50) NOT NULL,
	birth_year datetime(6) DEFAULT NULL,
	ssn varchar(100) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Library (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	shelf_id int(11) NOT NULL,
	library_name varchar(50) NOT NULL,
	book_barcode int(50) NOT NULL,
	inclusion_date date DEFAULT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Authors_Books (
	books_id int(11) NOT NULL,
	authors_id int(11) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Library_Books (
	library_id int(11) NOT NULL,
	books_id int(11) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Publisher (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	publisher_name int(11) NOT NULL,
	publisher_address varchar(50) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Users (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	username varchar(50) NOT NULL,
	usertype varchar(50) NOT NULL,
	hashed_pass varchar(50) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;

CREATE TABLE Images (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	file varchar(100) NOT NULL
)ENGINE=innoDB DEFAULT CHARSET=utf8;
	
INSERT INTO Authors (id, first_name, last_name, URL, ssn, birth_year) VALUES
(1, 'Stieg', 'Larsson', '', '', NULL),
(2, 'Lars', 'Kepler', '', '', NULL),
(3, 'Lee', 'Child', '', '', NULL),
(4, 'Camilla', 'Läckberg', '', '', NULL);

INSERT INTO Books (id, title, publisher_id, publication_date, isbn_number, pages_number, edition_number, is_reserved) VALUES
(1, 'Män Som Hatar Kvinnor', 1, 2010-08-05, '9780553826166', 560, '0', 0),
(2, 'Hypnotisören', 2, 2010-03-12, '9789170017582', 572, '0', 0),
(3, 'Killing Floor', 2, 2010-08-05, '9780553826166', 560, '0',0),
(4, 'Isprinsessan', 3, 2017-04-07, '9789175037431', 320, '0', 0);

INSERT INTO Authors_Books (books_id, authors_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

INSERT INTO Users (username, usertype, hashed_pass) VALUES
('admin', 'admin', SHA('page')),
('second', 'browser', SHA('user'));
					 
SELECT * FROM Books
JOIN Authors_Books ON Books.id = Authors_Books.books_id
JOIN Authors ON Authors.id = Authors_Books.authors_id
WHERE Books.title LIKE '%'
					 
?>
</body>
</html>