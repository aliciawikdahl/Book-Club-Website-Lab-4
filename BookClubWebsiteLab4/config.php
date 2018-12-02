<?php
	$current_page=$_SERVER['REQUEST_URI'];
	$current_page=explode('/', $current_page);
	$current_page=end($current_page);

	$dbserver = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'book_club_website';
?>