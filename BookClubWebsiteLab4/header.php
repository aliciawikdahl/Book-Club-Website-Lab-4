<?php
	include "config.php";
	/* include "cookie.php";
	include "session.php"; */
?>

<!DOCTYPE>
<html>

	<head>
		<title>My PHP Site</title>
		<meta charset="utf-8"/>
		<link href="main.css" type="text/css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"/>
	</head>
	<body>
			<header>
					<nav>
						<ul>
							<li>
								<a class="<?php
									echo($current_page == 'index.php' || $current_page == '')? 'active' : NULL?>"
									href="index.php">Home</a>
							</li>
							<li>
								<a class="<?php
									echo($current_page == 'aboutUs.php')? 'active' : NULL?>"
								href="aboutUs.php">About Us</a>
							</li>
							<li>
								<a class="<?php
									echo($current_page == 'browsBooks.php')? 'active' : NULL?>" 
								href="browseBooks.php">Library</a>
							</li>
							<li>
								<a class="<?php
									echo($current_page == 'myBooks.php')? 'active' : NULL?>"
								href="myBooks.php">My Books</a>
							</li>
							<li>
								<a class="<?php
									echo($current_page == 'gallery.php')? 'active' : NULL?>"
								href="gallery.php">Gallery</a>
							</li>
							<li>
								<a class="<?php
									echo($current_page == 'contact.php')? 'active' : NULL?>"
								href="contact.php">Contact</a>
							</li>
						</ul>
					</nav>
			</header>
