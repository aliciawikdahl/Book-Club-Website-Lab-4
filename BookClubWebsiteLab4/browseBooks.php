
<?php

include "header.php";

	//	OPENS DATABASE

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	// CHECKS IF CONNECTED, IF NOT SAY WHY NOT

	if($db->connect_error) {

		echo "Could not connect to database, because of: " . $db->connect_error;
		exit(); // STOP RIGHT HERE, NO MORE TO EXECUTE
	}

$searchbook = "";
$searchauthor = "";

//HAS THE GET CALLED bookid BEEN EXECUTED?
//UPDATES STATUS OF BOOK TO RESERVED

if(isset($_GET['bookid'])) {

	$bookid = $_GET['bookid'];
	$IDquery = "UPDATE Books
				SET is_reserved=1
				WHERE id = $bookid";

	$stmt = $db->prepare($IDquery);
	$stmt->execute();

	if($stmt->execute()) {

	$prompt_msg = "Your book has been reserved. You can check it out in the My Books page!";
	
	echo("<script type='text/javascript'>window.alert('".$prompt_msg."'); </script>");
	}


}


// ISSET CHECKS IF IT'S ACTIVATED
// IF THE POST IS SET & IF THE POST IS NOT EMPTY

	if (isset($_POST) && !empty($_POST)) {

// TAKES VALUE FROM FORM AND TRIMS OUT SPACES FROM THE STRING IT RECEIVES

		$searchauthor = mysqli_real_escape_string(trim($_POST['author']));
		$searchbook = mysqli_real_escape_string(trim($_POST['book']));
	}

/*	SELECT * FROM Books
	JOIN Authors_Books ON Books.id = Authors_Books.books_id
	JOIN Authors ON Authors.id = Authors_Books.authors_id
	WHERE Books.title LIKE '%'
*/

$query = "SELECT Books.title, Authors.first_name, Authors.last_name, Books.isbn_number, Books.id FROM Books
	JOIN Authors_Books ON Books.id = Authors_Books.books_id
	JOIN Authors ON Authors.id = Authors_Books.authors_id";

if($searchbook && !$searchauthor) {
	$query = $query . " WHERE Books.title LIKE '%" . $searchbook . "%' ";
}

if(!$searchbook && $searchauthor) {
	$query = $query . " WHERE Authors.last_name LIKE '%" . $searchauthor . "%' ";
}

if($searchbook && $searchauthor) {
	$query = $query . " WHERE Books.title LIKE '%" . $searchbook . "%' AND Authors.first_name LIKE '%" . $searchauthor . "%' ";
}


//PREPARE STATEMENT FOR EXECUTION


$stmt = $db->prepare($query);


$stmt->bind_result($title, $author_first, $author_last, $isbn, $bookid);
$stmt->execute();

?>
		<div id="browsebooks">

			<main>
				<h1>Library</h1>
				<form action="" method="post" class="Library">
					<input type="text" id="book" name="book" placeholder="Book"/>
      				<input type="text" id="author" name="author" placeholder="Author"/>
    				<button type="submit" value="Search">Search</button>
    			</form>

    			<ul class="browsebooks">
    			<?php

    			echo "<table width='100%'>";
    			echo "<tr><td class='header'>Book Title</td>
    			<td class='header'>Author</td>
    			<td class='header'>ISBN</td></tr>";

				while($stmt->fetch()) {

					echo "<td>$title</td>
					<td>$author_first $author_last</td>
					<td>$isbn</td>

					<td>

					<form method='get' action=''>
					<button name='bookid' value='".$bookid."' type ='submit' class='button'>Reserve</button>
					</form></td></tr>";

				}

				echo "</table";

				?>
				</ul>
			</main>

		</div>

<?php
	include "footer.php";
?>	
	</body>
</html>