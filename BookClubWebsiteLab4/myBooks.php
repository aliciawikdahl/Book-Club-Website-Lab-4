
<?php
	include "header.php";



	//	OPENS DATABASE

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	// CHECKS IF CONNECTED, IF NOT SAY WHY NOT

	if($db->connect_error) {

		echo "Could not connect to database, because of: " . $db->connect_error;
		exit(); // STOP RIGHT HERE, NO MORE TO EXECUTE
	}

	if(isset($_GET['bookid'])) {

	$bookid = $_GET['bookid'];
	$query = "UPDATE Books
				SET is_reserved=0
				WHERE id = $bookid";

	$stmt = $db->prepare($query);
	$stmt->execute();
}



?>
		<div id="pagecontainer">

			<main>
				<div class="mybooks">

				<h1>My Books</h1>

<?php

				$query = "SELECT Books.title, Authors.first_name, Authors.last_name, Books.isbn_number, Books.id FROM Books
				JOIN Authors_Books ON Books.id = Authors_Books.books_id
				JOIN Authors ON Authors.id = Authors_Books.authors_id
				WHERE Books.is_reserved=1";

				$stmt = $db->prepare($query);


				$stmt->bind_result($title, $author_first, $author_last, $isbn, $bookid);
				$stmt->execute();


				echo "<table width='100%'>";
    			echo "<tr><td>Book Title</td>
    			<td>Author</td>
    			<td>ISBN</td></tr>";

				while($stmt->fetch()) {

					echo "<td>$title</td>
					<td>$author_first $author_last</td>
					<td>$isbn</td>

					<td>

					<form method='get' action=''>
					<button name='bookid' value='".$bookid."' type ='submit' class='button'>Return</button>
					</form></td></tr>";


				}

				echo "</table";

?>
				</div>

			</main>

		</div>

<?php
	include "footer.php";
?>

	</body>
</html>